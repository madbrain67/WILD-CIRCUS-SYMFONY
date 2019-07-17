<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Require ROLE_ADMIN for *every* controller method in this class.
 *
 * @IsGranted("ROLE_ADMIN")
 */

class AdminController extends AbstractController
{

    private $params;


    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }


    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {

        return $this->render(
            'admin/index.html.twig', [
            'controller_name' => 'AdminController',
            ]
        );
    }

}
