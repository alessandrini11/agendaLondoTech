<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/",name="login")
     */
    public function login(AuthenticationUtils $utils): Response
    {
        $error = $utils->getLastUsername();
        $user = $utils->getLastAuthenticationError();
        return $this->render('login.html.twig',[
           'error' => $error !== null,
           'user' => $user
        ]);
    }

    /**
     * @Route("/logout",name="logout")
     * @return void
     */
    public function logout()
    {

    }

}