<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Poste;
use App\Form\PosteType;
use App\Repository\PosteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Date;
use DateTime;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

final class PosteController extends AbstractController
{
    #[Route('/posts', name: 'app_posts')]
    public function getallpost(PosteRepository $postRepository): Response
    {
        // Retrieve all posts from the repository
        $posts = $postRepository->findAll();
        dump($posts);
        // Render the Twig template and pass the posts
        return $this->render('poste/index.html.twig', [
            'posts' => $posts,
        ]);
    }
    #[Route('/ajouterPoste', name: 'ajouterPoste')]

    public function ajouterPoste(Request $request, EntityManagerInterface $entityManager): Response
    {
        $poste = new Poste();

        // Create the form and handle the request
        $form = $this->createForm(PosteType::class, $poste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $poste->setDatePublication(new DateTime());
            $poste->setEtat(false);
            // Save the post to the database
            $entityManager->persist($poste);
            $entityManager->flush();


            // Redirect to the posts list or success page
            return $this->redirectToRoute('app_posts');
        }

        // Render the form
        return $this->render('poste/ajouterPoste.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/post_edit/{id}', name: 'post_edit')]
    public function modifierPoste(int  $id)
{
    
}
#[Route('/post_delete/{id}', name: 'post_delete')]
    public function supprimerPoste(int  $id ,EntityManagerInterface $entityManager ): RedirectResponse

{
    $poste = $entityManager->getRepository(Poste::class)->find($id);
    
    if (!$poste) {
      //  $this->addFlash('error', 'The post does not exist.');
        return $this->redirectToRoute('app_posts'); 
    }

    $entityManager->remove($poste);
    $entityManager->flush();

    return $this->redirectToRoute('app_posts');
}

}

/*$poste = new Poste(); 
        $poste->setTitre("fatma");
        $poste->setContenue("88888");
        $poste->setDatePublication(new DateTime());
        $poste->setEtat(false);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($poste);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->redirectToRoute('app_posts');*/