<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TvRatingsRepository")
 */
class TvRatings
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\TvShows", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $tv_show;

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

    public function getTvShow(): ?TvShows
    {
        return $this->tv_show;
    }

    public function setTvShow(TvShows $tv_show): self
    {
        $this->tv_show = $tv_show;

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
