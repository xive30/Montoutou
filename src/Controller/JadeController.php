<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JadeController extends AbstractController
{
    #[Route('/jade', name: 'jade')]
    public function index(): Response
    {
        return $this->render('jade/index.html.twig', [
            'controller_name' => 'JadeController',
        ]);
    }
}
