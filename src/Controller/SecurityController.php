<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        
        // Récupérer l'erreur d'authentification si elle existe
        $error = $authenticationUtils->getLastAuthenticationError();
    
        return $this->render('security/login.html.twig', [
            'error' => $error,  // Passer les erreurs au template
        ]);
    }
    

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->redirectToRoute('app_login');
    }
}
