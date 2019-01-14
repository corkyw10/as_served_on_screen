<?php

namespace App\Controller;

use App\Form\SearchBoxType;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController {
  /**
   * @Route("/search", name="search", methods={"GET"})
   */
  public function search() {
    $form = $this->createForm(SearchBoxType::class, null, array('csrf_protection' => false));
    
    return $this->render('search.html.twig', array('results' => null, 
      'form' => $form->createView(),
      'searchTerm' => null));
  }
}

?>