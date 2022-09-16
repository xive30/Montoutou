<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HectorController extends AbstractController
{
    #[Route('compte/hector', name: 'hector')]
    public function index(): Response
    {
        return $this->render('hector/index.html.twig', [
            'controller_name' => 'HectorController',
        ]);
    }
}
