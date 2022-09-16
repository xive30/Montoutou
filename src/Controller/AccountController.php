<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/compte', name: 'account')]
    public function index(): Response
    {
        $user = $this->entityManager->getRepository(User::class)->findById($this->getUser());
        $animals = $this->entityManager->getRepository(Animal::class)->findByUser($user);
        // dd($user);

        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
            'animals' => $animals
        ]);
    }
}
