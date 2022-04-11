<?php

namespace App\Controller;

use App\Entity\ListeStage;
use App\Repository\ListeStageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StageController extends AbstractController
{
    /**
     * @Route("/list_des_stages", name="stage")
     */
    public function index(ListeStageRepository $listeStageRepository): Response
    {
        return $this->render('stage/index.html.twig', [
            'stages' => $listeStageRepository->findAll()
        ]);
    }

    /**
     * @Route("/stage_details/{id}", name="stagedetails")
     */
    public function stagedetails(ListeStage $ListeStage): Response
    {
        return $this->render('stage/stage_details.html.twig', [
            'ListeStage' => $ListeStage,
        ]);
    }
}
