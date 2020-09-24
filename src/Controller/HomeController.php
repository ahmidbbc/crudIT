<?php

namespace App\Controller;

use App\Repository\DanseRepository;
use App\Repository\EleveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(EleveRepository $eleveRepository, DanseRepository $danseRepository)
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'eleves' => $eleveRepository->findAll(),
            'danses' => $danseRepository->findAll(),
        ]);
    }
}
