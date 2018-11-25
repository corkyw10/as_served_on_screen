<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TvPeopleRepository")
 */
class TvPeople
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\People", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $person;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Episodes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $episode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPerson(): ?People
    {
        return $this->person;
    }

    public function setPerson(People $person): self
    {
        $this->person = $person;

        return $this;
    }

    public function getEpisode(): ?Episodes
    {
        return $this->episode;
    }

    public function setEpisode(Episodes $episode): self
    {
        $this->episode = $episode;

        return $this;
    }
}
