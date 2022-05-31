<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\SearchAnnonceType;
use App\Repository\EntrepriseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeEntrepriseController extends AbstractController
{
    /**
     * @Route("/Liste-des-entreprises", name="entreprise")
     */
    public function index(EntrepriseRepository $EntrepriseRepository,  Request $request): Response
    {
        $entreprise = $this->getDoctrine()->getRepository(Entreprise::class)->findAll();
        $form = $this->createForm(SearchAnnonceType::class);

        $search = $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // on recherche les products correspondant aux mots clés
            $entreprise = $EntrepriseRepository->search($search->get('mots')->getData());
        }
        return $this->render('entreprise/index.html.twig', [
            'controller_name' => 'ListeEntrepriseController',
            'entreprises' => $entreprise,
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/entreprise-details/{id}", name="entreprisedetails")
     */
    public function stagedetails(entreprise $entreprise): Response
    {
        return $this->render('entreprise/entreprise_details.html.twig', [
            'entreprise' => $entreprise,
        ]);
    }
}
