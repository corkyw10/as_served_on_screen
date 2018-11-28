<?php

namespace App\Controller;

use App\Entity\Films;

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
}
?>