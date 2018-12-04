<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController {
  /**
   * @Route("/home", name="home", methods={"GET"})
   */
  public function index() {
    return $this->render('cover.html.twig');
  }
}
?>