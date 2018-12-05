<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EpisodesRepository")
 */
class Episodes
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Seasons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $season;

    /**
     * @ORM\Column(type="string", length=220)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $episode_num;

    /**
     * @ORM\Column(type="string", length=220)
     */
    private $runtime;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

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

    public function getSeason(): ?Seasons
    {
        return $this->season;
    }

    public function setSeason(?Seasons $season): self
    {
        $this->season = $season;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getEpisodeNum(): ?int
    {
        return $this->episode_num;
    }

    public function setEpisodeNum(int $episode_num): self
    {
        $this->episode_num = $episode_num;

        return $this;
    }

    public function getRuntime(): ?string
    {
        return $this->runtime;
    }

    public function setRuntime(string $runtime): self
    {
        $this->runtime = $runtime;

        return $this;
    }
}
