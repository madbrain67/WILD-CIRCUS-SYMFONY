<?php

namespace App\Controller\Admin;

use App\Entity\Prices;
use App\Repository\PricesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Require ROLE_ADMIN for *every* controller method in this class.
 *
 * @IsGranted("ROLE_ADMIN")
 */

class AdminPricesController extends AbstractController
{

    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    /**
     * @Route("/admin/prices", name="prices_index", methods={"GET"})
     */
    public function index(Request $request, PricesRepository $pricesRepository): Response
    {

        return $this->render(
            'admin/prices/index.html.twig', [
            'prices' => $pricesRepository->findByTableau(),
            ]
        );
    }

    /**
     * @Route("/admin/ptrice/delete/{id}", name="price_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Prices $price): Response
    {
        if ($this->isCsrfTokenValid('delete'.$price->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($price);
            $entityManager->flush();
        }

        return $this->redirectToRoute('prices_index');
    }
}
