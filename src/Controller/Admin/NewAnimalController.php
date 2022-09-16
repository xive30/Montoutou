<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use App\Entity\User;
use App\Form\NewAnimalType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewAnimalController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager )
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/admin/nouvelle-entree', name: 'new_animal')]
    public function index(Request $request): Response
    {
        $animal = new Animal();
        $user = $this->entityManager->getRepository(User::class)->findById(1);
        $form = $this->createForm(NewAnimalType::class, $animal);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $animal = $form->getData();
            $animal->setUser($user[0]);

                $this->entityManager->persist($animal);
                $this->entityManager->flush();
            }

        
        return $this->render('admin/new_animal.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
