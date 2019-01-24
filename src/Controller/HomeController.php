<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Form\SearchBoxType;

class HomeController extends AbstractController {
  /**
   * @Route("/home", name="home", methods={"GET"})
   */
  public function index(Request $request, SearchBoxType $search) {
    $form = $this->createForm(SearchBoxType::class, null, array('csrf_protection' => false));

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $searchTerm = $form->getData();
      $searchTerm = $searchTerm['search'];

      return $this->redirectToRoute('search', array('searchTerm' => $searchTerm));
    }

    return $this->render('cover.html.twig', array(
        'form' => $form->createView(),
    ));
  }
}
?>