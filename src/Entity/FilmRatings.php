<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmRatingsRepository")
 */
class FilmRatings
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Films", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $film;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_votes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilm(): ?Films
    {
        return $this->film;
    }

    public function setFilm(Films $film): self
    {
        $this->film = $film;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getNumVotes(): ?int
    {
        return $this->num_votes;
    }

    public function setNumVotes(int $num_votes): self
    {
        $this->num_votes = $num_votes;

        return $this;
    }
}
