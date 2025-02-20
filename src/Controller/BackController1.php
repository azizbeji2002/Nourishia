<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BackController1 extends AbstractController
{
    #[Route('/back1', name: 'app_back1')]
    public function index(): Response
    {
        return $this->render('back1/index.html.twig', [
            'controller_name' => 'BackController',
        ]);
    }
}
