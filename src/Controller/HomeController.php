<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/')]
final class HomeController extends AbstractController
{
    #[Route(name: 'app_front_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('testFront.html.twig');
    }

    #[Route('back',name: 'app_home_index', methods: ['GET'])]
    public function indexback(): Response
    {
        return $this->render('back.html.twig');
    }
}