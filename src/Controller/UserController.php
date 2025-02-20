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
}

