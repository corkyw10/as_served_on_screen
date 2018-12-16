<?php

namespace App\Controller;

use App\Entity\Films;
use App\Entity\FilmRestaurants;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class FilmsController extends AbstractController {
  /**
   * @Route("/films", name="films", methods={"GET"})
   */
  public function showFilms() {
    $films = $this->getDoctrine()->getRepository(Films::class)->findAll();    

    return $this->render('filmlist.html.twig', array('films' => $films));
  }

  /**
   * @Route("/films/{filmId}", name="filmrestaurants", methods={"GET"})
   */
  public function showFilmRestaurants($filmId) {
    $restaurants = $this->getDoctrine()->getRepository(FilmRestaurants::class)->getRestaurantsAlphabetically($filmId);
    $film = $this->getDoctrine()->getRepository(Films::class)->findOneBy(['id' => $filmId]);

    return $this->render("filmrestaurantslist.html.twig", array('restaurants' => $restaurants, 'film' => $film));  
  }

  /**
   * @Route("films/{filmId}/{restaurantId}", name="filmRestaurantInfo", methods={"GET"})
   */
  public function showRestaurantInfo($filmId, $restaurantId) {
    $restaurant = $this->getDoctrine()->getRepository(FilmRestaurants::class)->findOneBy(['id' => $restaurantId]);

    return $this->render('restaurantinfo.html.twig', array('restaurant' => $restaurant));
  }
}
?>