<?php

namespace App\Controller;

use App\Entity\TvShows;
use App\Entity\Seasons;
use App\Entity\Episodes;
use App\Entity\TvRestaurants;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

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
   * @Route("tvshows/{tvShowId}/{restaurantId}", name="restaurantInfo", options={"expose"=true}, methods={"GET"})
   */
  public function showRestaurantInfo($tvShowId, $restaurantId) {
    $restaurant = $this->getDoctrine()->getRepository(TvRestaurants::class)->findBy(['id' => $restaurantId]);

    return $this->render('restaurantinfo.html.twig', array('restaurant' => $restaurant));
  }

  /**
   * @Route("/getepisodejson", name="getEpisodeJson", methods={"GET"})
   */
  // New request object created
  public function getEpisodeJson(Request $request) {
    // get season Id from request to enable query to get seasons, then to episodes
    $content = $request->query->get('seasonId');
    $season = $this->getDoctrine()->getRepository(Seasons::class)->findBy(['id' => $content]);
    $episodes = $this->getDoctrine()->getRepository(Episodes::class)->findBy(['season' => $content]);
    // New Json response object created
    $jsonResponse = new JsonResponse();
    if ($request->isXmlHttpRequest()) {
      // Check to see if request is an Ajax request
      $jsonData = array();
      $idx = 0;
      foreach ($episodes as $episode) {
        // Add data to array that is then passed into JsonResponse object
        $temp = array(
          'title' => $episode->getTitle(),
          'episodeId' => $episode->getId()
        );
        $jsonData[$idx++] = $temp;
      }
      $jsonResponse->setData(array('result' => $jsonData));
      // Data passed to JsonResponse inside assoc array as per XSSI protection rules
    }
    return $jsonResponse;
  }

  /**
   * @Route("/getrestaurantjson", name="getRestaurantJson", methods={"GET"})
   */
  public function getRestaurantJson(Request $request) {
    $content = $request->query->get('episodeId');
    $restaurants = $this->getDoctrine()->getRepository(TvRestaurants::class)->findBy(['episode' => $content]);

    $jsonResponse = new JsonResponse();
    if ($request->isXmlHttpRequest()) {
      $jsonData = array();
      $idx = 0;
      foreach ($restaurants as $restaurant) {
        $temp = array (
          'id' => $restaurant->getId(),
          'name' => $restaurant->getName(),
          'episodeId' => $restaurant->getEpisode()->getId(),
          'imageUrl' => $restaurant->getImageUrl(),
          'tvShowId' => $restaurant->getEpisode()->getTvShow()->getId()
        );
      $jsonData[$idx++] = $temp;        
      }
      $jsonResponse->setData(array('result' => $jsonData));
    }
    return $jsonResponse;
    }
}
?>