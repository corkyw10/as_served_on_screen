<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SearchRepository")
 */
class Search
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=220)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $native_id;

    /**
     * @ORM\Column(type="string", length=220)
     */
    private $route;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $restaurant_id;

    /**
     * @ORM\Column(type="string", length=220)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNativeId(): ?int
    {
        return $this->native_id;
    }

    public function setNativeId(int $native_id): self
    {
        $this->native_id = $native_id;

        return $this;
    }

    public function getRoute(): ?string
    {
        return $this->route;
    }

    public function setRoute(string $route): self
    {
        $this->route = $route;

        return $this;
    }

    public function getRestaurantId(): ?int
    {
        return $this->restaurant_id;
    }

    public function setRestaurantId(?int $restaurant_id): self
    {
        $this->restaurant_id = $restaurant_id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
