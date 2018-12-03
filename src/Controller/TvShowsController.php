<?php

namespace App\Controller;

use App\Entity\TvShows;
use App\Entity\Seasons;
use App\Entity\Episodes;
use App\Entity\TvRestaurants;

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
   * @Route("tvshows/{tvShowId}", name="seasons", methods={"GET"})
   */
  public function showSeasons($tvShowId) {
    $tvShow = $this->getDoctrine()->getRepository(TvShows::class)->find($tvShowId);
    $seasons = $this->getDoctrine()->getRepository(Seasons::class)->findBy(['tv_show' => $tvShowId]);

    return $this->render('seasonlist.html.twig', array('tvShowId' => $tvShowId, 'seasons' => $seasons, 'tvShow' => $tvShow));
  }

  /**
   * @Route("tvshows/{tvShowId}/{seasonId}", name="episodes", methods={"GET"})
   */
  public function showEpisodes($tvShowId, $seasonId) {
    $episodes = $this->getDoctrine()->getRepository(Episodes::class)->findBy(['season' => $seasonId]);

    return $this->render('episodelist.html.twig', array('episodes' => $episodes));
  }

  /**
   * @Route("tvshows/{tvShowId}/{seasonId}/{episodeId}", name="tvShowRestaurants", methods={"GET"})
   */
  public function showRestaurants($tvShowId, $seasonId, $episodeId) {
    $restaurants = $this->getDoctrine()->getRepository(TvRestaurants::class)->findBy(['episode' => $episodeId]);

    return $this->render('tvshowrestaurantlist.html.twig', array('restaurants' => $restaurants));
  }
}
?>