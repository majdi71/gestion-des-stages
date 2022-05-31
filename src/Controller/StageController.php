<?php

namespace App\Controller;

use App\Entity\ListeStage;
use App\Form\ListeStageType;
use App\Repository\ListeStageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    /**
     *@Route("/etudiant/Déposer-stage", name="Deposerstage", methods={"GET", "POST"})
     */
    public function Deposerstage(Request $request, ListeStageRepository $ListeStageRepository): Response
    {
        $ListeStage = new ListeStage();
        $form = $this->createForm(ListeStageType::class, $ListeStage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ListeStageRepository->add($ListeStage);
            return $this->redirectToRoute('Deposerstage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etudiant/Deposerstage.html.twig', [
            'ListeStage' => $ListeStage,
            'form' => $form,
        ]);
    }
    public function __toString()
    {
        return $this->name;
    }
}
