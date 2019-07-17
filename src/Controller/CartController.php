<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Repository\CategoriesPricesRepository;
use App\Repository\GroupsPricesRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function index(): Response
    {
        return $this->render(
            'cart/index.html.twig', [
            'controller_name' => 'CartController',
            ]
        );
    }

    /**
     * @Route("/add/cart", name="add_cart", methods={"POST"})
     */
    public function addCart(
        Request $request, 
        ObjectManager $manager,
        CategoriesPricesRepository $CategoriesPricesRepository,
        GroupsPricesRepository $GroupsPricesRepository
    ): Response {

        $return  = false;
        $categorie = $request->request->get('categorie');
        $groups = $request->request->get('groups');
        $price = $request->request->get('price');
        $qt = $request->request->get('qt');

        $cat = $CategoriesPricesRepository->findOneBy(array("name" => $categorie));
        $grp = $GroupsPricesRepository->findOneBy(array("groups" => $groups));

        $cart = new Cart();
        $cart->setUser($this->getUser());
        $cart->setCategorie($cat);
        $cart->setGroups($grp);
        $cart->setQt(intval($qt));

        $manager->persist($cart);
        $manager->flush();

        $text = $qt.' * '.$groups.' ('.$categorie.')';
        $prix = $price * $qt;
        $return = array($text, $prix);

        return $this->json($return);
    }

}
