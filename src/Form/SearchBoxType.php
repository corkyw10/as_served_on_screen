<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

use App\Entity\Search;
use App\Repository\SearchRepository;



class SearchBoxType extends AbstractType {

  protected $form;

  private $searchRepository;

  public function __construct(SearchRepository $searchRepository) {
    $this->searchRepository = $searchRepository;
  }

  public function buildForm(FormBuilderInterface $builder, array $options) {

    /* Builds a search bar that must have a search term of at least 3 characters
     and not blank*/

    $builder
      ->setMethod('GET')
      ->add('search', SearchType::class, [
        'constraints' => [
          new Length(['min' => 3]),
          new notBlank(),]
      ])
      ->add('Submit', SubmitType::class);
  }

  public function returnSearchResults($form) {

    /* Returns an array with search results and search term to populate
     template renderer */

    $searchTerm = $form->getData();
    $searchTerm = $searchTerm['search'];
    $results = $this->searchRepository->getSearchResults($searchTerm);
    $templateParameters = array('results' => $results, 'searchTerm' => $searchTerm);
    return $templateParameters;
  }
}

?>