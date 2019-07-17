<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CartRepository")
 */
class Cart
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="carts")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CategoriesPrices", inversedBy="carts")
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GroupsPrices", inversedBy="carts")
     */
    private $groups;

    /**
     * @ORM\Column(type="integer")
     */
    private $qt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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

    public function getQt(): ?int
    {
        return $this->qt;
    }

    public function setQt(int $qt): self
    {
        $this->qt = $qt;

        return $this;
    }
}
