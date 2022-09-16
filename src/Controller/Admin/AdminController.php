<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {

        $animals = $this->entityManager->getRepository(Animal::class)->findAll();

        return $this->render('admin/index.html.twig', [
            'animals' => $animals,
        ]);
    }
}
