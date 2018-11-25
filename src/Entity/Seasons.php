<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SeasonsRepository")
 */
class Seasons
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TvShows")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tv_show;

    /**
     * @ORM\Column(type="integer")
     */
    private $season_num;

    /**
     * @ORM\Column(type="string", length=220)
     */
    private $season_title;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTvShow(): ?TvShows
    {
        return $this->tv_show;
    }

    public function setTvShow(?TvShows $tv_show): self
    {
        $this->tv_show = $tv_show;

        return $this;
    }

    public function getSeasonNum(): ?int
    {
        return $this->season_num;
    }

    public function setSeasonNum(int $season_num): self
    {
        $this->season_num = $season_num;

        return $this;
    }

    public function getSeasonTitle(): ?string
    {
        return $this->season_title;
    }

    public function setSeasonTitle(string $season_title): self
    {
        $this->season_title = $season_title;

        return $this;
    }
}
