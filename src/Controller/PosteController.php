<?php

namespace App\Controller;

use App\Entity\Commentaire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Poste;
use App\Form\CommentaireType;
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
        $posts = $postRepository->findAllWithComments();
        $forms = [];
        foreach ($posts as $post) {
            // Create a new Comment form for each post
            $commentaire = new Commentaire();
            $form = $this->createForm(CommentaireType::class, $commentaire, [
                'action' => $this->generateUrl('creecommentaire', ['postId' => $post->getId()]),
            ]);
            $forms[$post->getId()] = $form->createView();
        }
        // Render the Twig template and pass the posts
        return $this->render('poste/index.html.twig', [
            'posts' => $posts,
            'commentForms' => $forms,
        ]);
    }

    #[Route('/ajouterPoste', name: 'ajouterPoste')]
    public function ajouterPoste(Request $request, EntityManagerInterface $entityManager): Response
    {
        $poste = new Poste();
        $form = $this->createForm(PosteType::class, $poste);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Save the valid data
            $poste->setDatePublication(new \DateTime());
            $poste->setEtat(false);

            $entityManager->persist($poste);
            $entityManager->flush();

            // Redirect to another route after successful submission
            return $this->redirectToRoute('app_posts');
        }

        return $this->render('poste/ajouterPoste.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/modifierPoste/{id}', name: 'modifierPoste')]
    public function modifierPoste(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        // Récupérer le poste à modifier
        $poste = $entityManager->getRepository(Poste::class)->find($id);

        // Créer le formulaire avec les données du poste existant
        $form = $this->createForm(PosteType::class, $poste);
        $form->handleRequest($request);

        if ($form->isSubmitted() /*&& $form->isValid()*/) {
            // Save the valid data
            $poste->setEtat(false);

            $entityManager->persist($poste);
            $entityManager->flush();

            // Redirect to another route after successful submission
            return $this->redirectToRoute('app_posts');
        }

        return $this->render('poste/modifierPoste.html.twig', [
            'form' => $form->createView(),
            'poste' => $poste,
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

    #[Route('/creecommentaire/{postId}', name: 'creecommentaire')]
    public function createComment(Request $request, $postId, EntityManagerInterface $entityManager): Response
    {
        // Logic to handle the comment creation for a post
        $post = $entityManager->getRepository(Poste::class)->find($postId);

        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Save the valid data
            $commentaire->setdateCreation(new \DateTime());
            $commentaire->setnbrSignal(0);
            $commentaire->setPoste($post);
            $entityManager->persist($commentaire);
            $entityManager->flush();

            // Redirect to another route after successful submission
            return $this->redirectToRoute('app_posts');
        }

        return $this->render('commentaire/ajouterCommentaire.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/commentaire_delete/{id}', name: 'commentaire_delete')]
    public function supprimerCommentaire(int $id, EntityManagerInterface $entityManager): RedirectResponse
    {
        $commentaire = $entityManager->getRepository(Commentaire::class)->find($id);

        if (!$commentaire) {
            // Post does not exist, redirect back
            $this->addFlash('error', 'Le commentaire n\'existe pas.');
            return $this->redirectToRoute('app_posts');
        }

        // Remove the post from the database
        $entityManager->remove($commentaire);
        $entityManager->flush();

        $this->addFlash('success', 'Le commentaire a été supprimé avec succès.');
        return $this->redirectToRoute('app_posts');
    }

    #[Route('/commentaire_edit/{id}', name: 'commentaire_edit')]
    public function modifierCommentaire(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        // Récupérer le commentaire à modifier
        $commentaire = $entityManager->getRepository(Commentaire::class)->find($id);

        // Vérifier si le commentaire existe
        if (!$commentaire) {
            $this->addFlash('error', 'Le commentaire n\'existe pas.');
            return $this->redirectToRoute('app_posts');
        }

        // Créer le formulaire avec les données du commentaire existant
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Mettre à jour le commentaire dans la base de données
            $entityManager->persist($commentaire);

            $entityManager->flush();
            // Ajouter un message de succès
            // $this->addFlash('success', 'Le commentaire a été modifié avec succès.');

            // Rediriger vers la liste des posts
            return $this->redirectToRoute('app_posts');
        }

        // Si le formulaire n'est pas encore soumis ou n'est pas valide, afficher la vue
        return $this->render('commentaire/modifierCommentaire.html.twig', [
            'form' => $form->createView(),
            'commentaire' => $commentaire, // Passer le commenatire pour l'afficher si nécessaire dans le template
        ]);
    }
}
