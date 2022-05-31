<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use App\Repository\SoutenanceRepository;
use App\Repository\SoutenancesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant", name="etudiant")
     */
    public function index(): Response
    {
        return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }
    /**
     * @Route("/etudiant/Procédure-de-stage ", name="Procedurestage")
     */
    public function Procedurestage(): Response
    {
        return $this->render('etudiant/Procedurestage.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }
    /**
     * @Route("/etudiant/Formulaire-demande-de-stage", name="demandestage")
     */
    public function demandestage(): Response
    {
        return $this->render('etudiant/demandestage.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }


    /**
     * @Route("/etudiant/Liste-des-soutenances ", name="Listesoutenances")
     */
    public function Listesoutenances(SoutenanceRepository $SoutenancesRepository): Response
    {
        return $this->render('etudiant/Listesoutenances.html.twig', [
            'soutenances' => $SoutenancesRepository->findAll()
        ]);
    }
    /**
     * @Route("/etudiant/Liste-des-entreprises ", name="Listentreprises")
     */
    public function Listentreprises(EntrepriseRepository $entreprise): Response
    {
        return $this->render('etudiant/Listentreprises.html.twig', [
            'entreprises' => $entreprise->findAll()
        ]);
    }
    /**
     * @Route("/etudiant/Archive-des-stages ", name="Archivestages")
     */
    public function Archivestages(): Response
    {
        return $this->render('etudiant/Archivestages.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }

    /**
     * @Route("/etudiant/entreprise-details/{id}", name="detentreprise")
     */
    public function entreprisedetails(Entreprise $entreprise): Response
    {
        return $this->render('entreprise/entreprisedetails.html.twig', [
            'entreprise' => $entreprise,
        ]);
    }
}
