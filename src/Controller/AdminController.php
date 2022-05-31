<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\Soutenance;
use App\Entity\User;
use App\Form\EntrepriseType;
use App\Form\RegistrationFormType;
use App\Form\SoutenanceType;
use App\Form\UserType;
use App\Repository\EntrepriseRepository;
use App\Repository\SoutenanceRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class AdminController extends AbstractController
{
    private $formFactory;
    private $entityManagerInterface;
    private $router;

    public function __construct(
        FormFactoryInterface $formFactory,
        EntityManagerInterface $entityManagerInterface,
        RouterInterface $router
    ) {
        $this->formFactory = $formFactory;
        $this->entityManagerInterface = $entityManagerInterface;
        $this->router = $router;
    }

    /**
     * @Route("/admin/home", name="home")
     */
    public function home(): Response
    {
        return $this->render('admin/home.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    /**
     *@Route("/admin/ajouter", name="addentreprise", methods={"GET", "POST"})
     */
    public function AddEntreprise(Request $request, EntrepriseRepository $EntrepriseRepository): Response
    {
        $Entreprise = new Entreprise();
        $form = $this->createForm(EntrepriseType::class, $Entreprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $EntrepriseRepository->add($Entreprise);
            return $this->redirectToRoute('addentreprise', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/AddEntreprise.html.twig', [
            'Entreprise' => $Entreprise,
            'form' => $form,
        ]);
    }
    /**
     *@Route("/admin/addutilisateur", name="adduser")
     */
    public function AddUser(Request $request, UserRepository $UserRepository): Response
    {
        $User = new User();
        $form = $this->createForm(UserType::class, $User);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $UserRepository->add($User);
            return $this->redirectToRoute('adduser', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('admin/adduser.html.twig', [
            'user' => $User,
            'form' => $form,
        ]);
    }
    /**
     * @Route("/admin/users", name="listuser")
     */
    public function listeuser(UserRepository $UserRepository): Response
    {
        return $this->render('admin/users.html.twig', [
            'users' => $UserRepository->findAll()
        ]);
    }
    /**
     * @Route("/admin/user/{id}/edit", name="useredit", methods={"GET", "POST"})
     */
    public function useredit(Request $request, User $User): Response
    {
        $form = $this->createForm(RegistrationFormType::class, $User);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->flush();
            return $this->redirectToRoute('listuser');
        }

        return $this->render('admin/edituser.html.twig', [
            "form" => $form->createView(),

            array('form' => $form),
        ]);
    }
    /**
     * @Route("/admin/listuser/delete/{id}", name="supp")
     */
    public function deleteuser(User $User, Request $request)
    {
        $this->entityManagerInterface->remove($User);
        $this->entityManagerInterface->flush();

        return new RedirectResponse(
            $this->router->generate('listuser')
        );
    }
    /**
     * @Route("/admin/soutenances", name="sout")
     */
    public function soutenance(SoutenanceRepository $SoutenanceRepository): Response
    {
        return $this->render('admin/soutenaces.html.twig', [
            'soutenaces' => $SoutenanceRepository->findAll()
        ]);
    }
    /**
     * @Route("/admin/soutenance/{id}/edit", name="soutedit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Soutenance $Soutenance): Response
    {
        $form = $this->createForm(SoutenanceType::class, $Soutenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->flush();
            return $this->redirectToRoute('sout');
        }

        return $this->render('admin/edit.html.twig', [
            "form" => $form->createView(),

            array('form' => $form),
        ]);
    }
    /**
     * @Route("/admin/soutenance/delete/{id}", name="suppp")
     */
    public function delete(Soutenance $Soutenance, Request $request)
    {
        $this->entityManagerInterface->remove($Soutenance);
        $this->entityManagerInterface->flush();

        return new RedirectResponse(
            $this->router->generate('sout')
        );
    }
}
