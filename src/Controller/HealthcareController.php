<?php

namespace App\Controller;

use App\Entity\RendezVous;
use App\Form\RendezvousType;
use  DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HealthcareController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager )
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/admin/healthcare', name: 'healthcare')]
    public function index(Request $request): Response
    {


        $date = new \DateTime();
        $currentDate =  date('d-m-Y');
        $date2 = $date->modify('+ 6 months') ;
        $tomorowDate = date('Y-m-d', strtotime('+ 6 months'));



        $rdv = new RendezVous();
        $form = $this->createForm(RendezvousType::class, $rdv);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $rdv = $form->getData();
            $rdv->setdate($date);
            $rdv->setTomorowDate($date2);
            $rdv->setReminder(0);


                $this->entityManager->persist($rdv);
                $this->entityManager->flush();
            }

        return $this->render('admin/healthcare.html.twig', [
            'form' => $form->createView(),
            'currentDate' => $currentDate,
            'tomorowDate' => $tomorowDate
        ]);
    }
}
