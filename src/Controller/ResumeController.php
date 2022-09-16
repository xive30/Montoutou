<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResumeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager )
    {
        $this->entityManager = $entityManager;
    }
    #[Route('admin/resume', name: 'resume')]
    public function index(): Response
    {
        return $this->render('admin/resume.html.twig', [
            'controller_name' => 'ResumeController',
        ]);
    }
}
