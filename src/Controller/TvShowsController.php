<?php

namespace App\Controller;

use App\Entity\TvShows;
use App\Entity\Seasons;
use App\Entity\Episodes;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class TvShowsController extends AbstractController {
  /**
   * @Route("/tvshows", name="tvShows", methods={"GET"})
   */
  public function showTvShows() {
    $tvShows = $this->getDoctrine()->getRepository(TvShows::class)->findAll();    

    return $this->render('tvshowlist.html.twig', array('tvShows' => $tvShows));
  }

  /**
   * @Route("tvshows/{id}", name="seasons", methods={"GET"})
   */
  public function showSeasons($id) {
    $tvShow = $this->getDoctrine()->getRepository(TvShows::class)->find($id);
    $seasons = $this->getDoctrine()->getRepository(Seasons::class)->findBy(['tv_show' => $id]);

    return $this->render('seasonlist.html.twig', array('id' => $id, 'seasons' => $seasons, 'tvShow' => $tvShow));
  }

  /**
   * @Route("tvshows/{seasonId}/{episodeId}", name="episodes", methods={"GET"})
   */
  public function showEpisodes($seasonId, $episodeId) {
    $episodes = $this->getDoctrine()->getRepository(Episodes::class)->findBy(['season' => $seasonId]);

    return $this->render('episodelist.html.twig', array('episodes' => $episodes));
  }
}
?>