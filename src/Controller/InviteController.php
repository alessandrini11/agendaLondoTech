<?php

namespace App\Controller;

use App\Entity\Invite;
use App\Form\InviteType;
use App\Repository\InviteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/invite")
 */
class InviteController extends AbstractController
{
    /**
     * @Route("/", name="invite_index", methods={"GET"})
     */
    public function index(InviteRepository $inviteRepository): Response
    {
        return $this->render('invite/index.html.twig', [
            'invites' => $inviteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="invite_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $invite = new Invite();
        $form = $this->createForm(InviteType::class, $invite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($invite);
            $entityManager->flush();

            return $this->redirectToRoute('invite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('invite/new.html.twig', [
            'invite' => $invite,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="invite_show", methods={"GET"})
     */
    public function show(Invite $invite): Response
    {
        return $this->render('invite/show.html.twig', [
            'invite' => $invite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="invite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Invite $invite): Response
    {
        $form = $this->createForm(InviteType::class, $invite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('invite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('invite/edit.html.twig', [
            'invite' => $invite,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="invite_delete", methods={"POST"})
     */
    public function delete(Request $request, Invite $invite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$invite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($invite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('invite_index', [], Response::HTTP_SEE_OTHER);
    }
}
