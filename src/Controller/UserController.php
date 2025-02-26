<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UpdateAdminType;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;


final class UserController extends AbstractController
{
    #[Route('/supp_user/{email}', name: 'app_supp_user')]
    public function deleteUser(ManagerRegistry $manager, $email, UserRepository $repo): Response
    {
        $user = $repo->findOneBy(['email' => $email]);
        $em = $manager->getManager();
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('app_login');
    }

    #[Route('/update{email}', name: 'app_update')]
    public function update(User $user,Request $request,EntityManagerInterface $em,UserPasswordHasherInterface $userPasswordHasher): Response
    {   
        if(!$this->getUser())
        {
            return $this->redirectToRoute('app_login');
        }
         
        
        $form = $this->createForm(UserType::class,$user);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('password')->getData();
             
            // encode the plain password
            $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));

            $em->flush();
            return $this->redirectToRoute('app_front');

        }
        
        return $this->render('user/update.html.twig', [
            'f' => $form->createView(),
        ]);
    }
    #[Route('/back/user', name: 'app_affiche')]

    public function affiche(EntityManagerInterface $em)
    {
        $users = $em->getRepository(User::class)->findAll();

        return $this->render('back1/index.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/updateAdmin/{id}', name: 'app_updateAdmin')]
    public function updateAdmin($id,Request $request,EntityManagerInterface $em,UserRepository$repo): Response
    {        
        $user = $repo->find($id);        
        $form = $this->createForm(UpdateAdminType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('app_affiche');
        }
        return $this->render('user/updateAdmin.html.twig', [
            'f' => $form->createView(),
       ]);
    }
    #[Route('/supp_admin/{id}', name: 'app_supp_admin')]
    public function deleteAdminr(ManagerRegistry $manager, $id, UserRepository $repo): Response
    {
        $user = $repo->findOneBy(['id' => $id]);
        $em = $manager->getManager();
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('app_affiche');
    }
    #[Route('/filter', name: 'filter', methods: ['GET'])]
    public function getUsersByStatus(Request $request, UserRepository $userRepository): JsonResponse
    {
        $verified = $request->query->getBoolean('verified');
        $users = $userRepository->findBy(['verified' => $verified]);

        return $this->json($users);
    }

    #[Route('/search', name: 'search', methods: ['GET'])]
    public function searchUsers(Request $request, UserRepository $userRepository): JsonResponse
    {
        $name = $request->query->get('name', '');
        $verified = $request->query->getBoolean('verified');

        $users = $userRepository->searchByNameAndStatus($name, $verified);

        return $this->json($users);
    }
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(Request $request, UserRepository $userRepository): Response
    {
        // Récupérer les paramètres de la requête
        $verified = $request->query->get('verified'); // Paramètre de vérification (1 ou 0)
        $name = $request->query->get('name', ''); // Recherche par nom (par défaut vide)
    
        // Créer un tableau de critères pour la recherche
        $criteria = [];
    
        if ($verified !== null) {
            // Si un filtre "verified" est passé, nous l'ajoutons aux critères
            $criteria['isVerified'] = (bool) $verified;
        }
    
        if (!empty($name)) {
            // Si un nom est passé, ajoutez-le également comme critère de recherche
            $users = $userRepository->searchByNameAndStatus($name, $criteria['isVerified'] ?? null);
        } else {
            // Sinon, si aucun nom n'est fourni, nous appliquons seulement le filtre de vérification
            $users = $userRepository->findBy($criteria);
        }
    
        return $this->render('back1/index.html.twig', [
            'users' => $users,
        ]);
}
}

