<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Poste;
use App\Form\PosteType;
use App\Repository\PosteRepository;
use Doctrine\ORM\EntityManagerInterface;
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

    // Dans le fichier PosteController.php

#[Route('/post_edit/{id}', name: 'post_edit')]
public function modifierPoste(int $id, Request $request, EntityManagerInterface $entityManager): Response
{
    // Récupérer le poste à modifier
    $poste = $entityManager->getRepository(Poste::class)->find($id);

    // Vérifier si le poste existe
    if (!$poste) {
        $this->addFlash('error', 'Le poste n\'existe pas.');
        return $this->redirectToRoute('app_posts');
    }

    // Créer le formulaire avec les données du poste existant
    $form = $this->createForm(PosteType::class, $poste);
    $form->handleRequest($request);

    // Si le formulaire est soumis et valide
    if ($form->isSubmitted() && $form->isValid()) {
        // Mettre à jour le poste dans la base de données
        $entityManager->flush();

        // Ajouter un message de succès
        $this->addFlash('success', 'Le poste a été modifié avec succès.');

        // Rediriger vers la liste des posts
        return $this->redirectToRoute('app_posts');
    }

    // Si le formulaire n'est pas encore soumis ou n'est pas valide, afficher la vue
    return $this->render('poste/modifierPoste.html.twig', [
        'form' => $form->createView(),
    ]);
}


    #[Route('/post_delete/{id}', name: 'post_delete')]
    public function supprimerPoste(int $id, EntityManagerInterface $entityManager): RedirectResponse
    {
        $poste = $entityManager->getRepository(Poste::class)->find($id);

        if (!$poste) {
            // Post does not exist, redirect back
            $this->addFlash('error', 'Le poste n\'existe pas.');
            return $this->redirectToRoute('app_posts');
        }

        // Remove the post from the database
        $entityManager->remove($poste);
        $entityManager->flush();

        $this->addFlash('success', 'Le poste a été supprimé avec succès.');
        return $this->redirectToRoute('app_posts');
    }
}
