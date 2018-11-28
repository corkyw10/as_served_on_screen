<?php

namespace App\Controller;

use App\Entity\TvShows;

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
}
?>