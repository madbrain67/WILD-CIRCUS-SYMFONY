<?php

namespace App\Service;

use App\Repository\CartRepository;

class Cart
{

    private $repo;

    public function __construct(CartRepository $CartRepository) 
    {
        $this->repo = $CartRepository;
    }

    public function checkPanier($id) 
    {
        return $this->repo->findByCart($id);
    }

}