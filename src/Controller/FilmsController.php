<?php

namespace App\Controller;

use App\Entity\Films;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class FilmsController extends AbstractController {
  /**
   * @Route("/films", name="films")
   * @Method({"GET"})
   */
  public function showFilms() {
    $films = $this->getDoctrine()->getRepository(Films::class)->findAll();

    return $this->render('jumbo.html.twig', array('films' => $films));
  }
}
?>