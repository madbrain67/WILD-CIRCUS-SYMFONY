<?php

namespace App\Controller\Admin;

use App\Entity\GroupsPrices;
use App\Repository\GroupsPricesRepository;
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

class AdminGroupsController extends AbstractController
{

    private $params;

    public function __construct()
    {
        $this->params = $params;
    }

    /**
     * @Route("/admin/groups", name="groups_index", methods={"GET"})
     */
    public function index(Request $request, GroupsPricesRepository $groupsRepository): Response
    {

        return $this->render(
            'admin/groups/index.html.twig', [
            'headers' => $groupsRepository->findAll(),
            ]
        );
    }

}
