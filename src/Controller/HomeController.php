<?php

namespace App\Controller;

use App\Entity\Search;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Form\SearchBoxType;

class HomeController extends AbstractController {
  /**
   * @Route("/home", name="home", methods={"GET"})
   */
  public function index(Request $request) {
    $form = $this->createForm(SearchBoxType::class, null, array('csrf_protection' => false));

    $form->handleRequest($request);

    if ($form->isSubmitted()) {
      $searchTerm = $form->getData();
      $searchTerm = $searchTerm['search'];
      $results = $this->getDoctrine()->getRepository(Search::class)->getSearchResults($searchTerm);

      dump($results);


      return $this->render('search.html.twig', array('results' => $results, 
        'form' => $form->createView(),
        'searchTerm' => $searchTerm));
    }


    return $this->render('cover.html.twig', array(
        'form' => $form->createView(),
    ));
  }
}
?>