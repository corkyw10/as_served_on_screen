<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmRestaurantsRepository")
 */
class FilmRestaurants
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Films")
     * @ORM\JoinColumn(nullable=false)
     */
    private $film;

    /**
     * @ORM\Column(type="string", length=220)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=220)
     */
    private $street_address;

    /**
     * @ORM\Column(type="string", length=220)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=220)
     */
    private $post_code;

    /**
     * @ORM\Column(type="string", length=220)
     */
    private $country;

    /**
     * @ORM\Column(type="decimal", precision=18, scale=14)
     */
    private $lat;

    /**
     * @ORM\Column(type="decimal", precision=18, scale=14)
     */
    private $lng;

    /**
     * @ORM\Column(type="string", length=220, nullable=true)
     */
    private $osm_id;

    /**
     * @ORM\Column(type="string", length=220, nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=220)
     */
    private $image_url;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilm(): ?Films
    {
        return $this->film;
    }

    public function setFilm(?Films $film): self
    {
        $this->film = $film;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStreetAddress(): ?string
    {
        return $this->street_address;
    }

    public function setStreetAddress(string $street_address): self
    {
        $this->street_address = $street_address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostCode(): ?string
    {
        return $this->post_code;
    }

    public function setPostCode(string $post_code): self
    {
        $this->post_code = $post_code;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLat($lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng()
    {
        return $this->lng;
    }

    public function setLng($lng): self
    {
        $this->lng = $lng;

        return $this;
    }

    public function getOsmId(): ?string
    {
        return $this->osm_id;
    }

    public function setOsmId(?string $osm_id): self
    {
        $this->osm_id = $osm_id;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->image_url;
    }

    public function setImageUrl(string $image_url): self
    {
        $this->image_url = $image_url;

        return $this;
    }
}
