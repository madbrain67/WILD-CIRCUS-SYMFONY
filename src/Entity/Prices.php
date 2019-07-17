<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PricesRepository")
 */
class Prices
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CategoriesPrices", inversedBy="prices")
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GroupsPrices", inversedBy="prices")
     */
    private $groups;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCategorie(): ?CategoriesPrices
    {
        return $this->categorie;
    }

    public function setCategorie(?CategoriesPrices $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getGroups(): ?GroupsPrices
    {
        return $this->groups;
    }

    public function setGroups(?GroupsPrices $groups): self
    {
        $this->groups = $groups;

        return $this;
    }
}
