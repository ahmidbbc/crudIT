<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ExplainToMeController extends AbstractController
{
    /**
     * @Route("/explain/to/me", name="explain_to_me")
     */
    public function index()
    {
        return $this->render('explain_to_me/index.html.twig', [
            'controller_name' => 'ExplainToMeController',
        ]);
    }
}
