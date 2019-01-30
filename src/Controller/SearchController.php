<?php

namespace App\Controller;

use App\Form\SearchBoxType;

use App\Entity\Search;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController {
  /**
   * @Route("/search", name="search", methods={"GET"})
   */
  public function search(Request $request, SearchBoxType $search) {

    /* Search page contains a search bar that returns links to restaurants
    tv shows and films. Validation requirements are that the search term
    must be at least 3 characters and not blank.  */

    $form = $this->createForm(SearchBoxType::class, null, array('csrf_protection' => false));
    
    if ($request->get('searchTerm')) {
      // Gets search term from redirected search request page and performs database search
      $searchTerm = $request->get('searchTerm');
      $results = $this->getDoctrine()->getRepository(Search::class)->getSearchResults($searchTerm);

      return $this->render('search.html.twig', array('results' => $results, 
      'form' => $form->createView(),
      'searchTerm' => $searchTerm));
      
    } else {  
      // Performs database search for queries directly from search page
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $results = $search->returnSearchResults($form);

        return $this->render('search.html.twig', array('results' => $results['results'], 
        'form' => $form->createView(),
        'searchTerm' => $results['searchTerm']));
      }      
    }

    return $this->render('search.html.twig', array('results' => null, 
      'form' => $form->createView(),
      'searchTerm' => null));
  } 
}
?>