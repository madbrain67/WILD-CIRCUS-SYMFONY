<?php

namespace App\Controller\Admin;

use App\Entity\CategoriesPrices;
use App\Repository\CategoriesPricesRepository;
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

class AdminCategoriesController extends AbstractController
{

    private $params;

    public function __construct()
    {
        $this->params = $params;
    }

    /**
     * @Route("/admin/categories", name="categories_index", methods={"GET"})
     */
    public function index(Request $request, CategoriesPricesRepository $categoriesRepository): Response
    {

        return $this->render(
            'admin/categories/index.html.twig', [
            'headers' => $categoriesRepository->findAll(),
            ]
        );
    }

}