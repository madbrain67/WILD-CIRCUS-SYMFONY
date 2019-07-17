<?php

namespace App\Controller;

use App\Entity\Prices;
use App\Entity\CategoriesPrices;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PricesController extends AbstractController
{
    /**
     * @Route("/prices", name="prices")
     */
    public function index()
    {

        $categories = $this->getDoctrine()
            ->getManager()
            ->getRepository(CategoriesPrices::class)
            ->findAll();

        $tableauPrices = $this->getDoctrine()
            ->getManager()
            ->getRepository(Prices::class)
            ->findByTableau();
        
        return $this->render(
            'prices/index.html.twig', [
            'tableauPrices' => $tableauPrices,
            'categories' => $categories,
            ]
        );
    }
}
