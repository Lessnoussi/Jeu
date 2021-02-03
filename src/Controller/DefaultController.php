<?php
/**
 * Created by PhpStorm.
 * User: electroplanet
 * Date: 03/02/2021
 * Time: 09:18
 */

namespace App\Controller;


use App\Repository\CarteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * @Route("/index", name="home")
     * @return: Response
     */
    public function index(CarteRepository $repository):Response
    {
        $nonSortedCartes = $repository->findTenNonSortedCarte();
      //  $cartes = $repository->findTenSortedCarte();
        $cartes = $this->sortCartes($repository);
        return $this->render('home.html.twig',
           [
               'nonSortedCartes' => $nonSortedCartes,
               'cartes' => $cartes
           ]
        );

    }


    public function sortCartes(CarteRepository $repository){
        $nonSortedCartes = $repository->findTenNonSortedCarte();
        $colors = array();
        $vals= array();

        foreach ($nonSortedCartes as $carte){
            $colors [] = $carte->getCouleur();
            $vals [] = $carte->getValeur();
        }
        array_multisort($colors, $vals, SORT_ASC, $nonSortedCartes);
        return $nonSortedCartes;

    }
}