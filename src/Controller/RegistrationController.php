<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserProfilType;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Mime\Email;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authenticator\FormLoginAuthenticator;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, VerifyEmailHelperInterface $verifyEmailHelper, ManagerRegistry $doctrine, MailerInterface $mailer): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager = $doctrine->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            
            $signatureComponents = $verifyEmailHelper->generateSignature(
                'app_verify_email',
                $user->getId(),
                $user->getEmail(),
                ['id' => $user->getId()]
            );
            
            $this->addFlash('success', 'Confirm your email at: '.$signatureComponents->getSignedUrl());

            $email = (new Email())
                ->from('alienmailcarrier@example.com')
                ->to($user->getEmail())
                ->subject('Welcome to the Space Bar!')
                ->text("Nice to meet you! ❤️");

                $mailer->send($email);

            return $this->redirectToRoute('app_accueil');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }


    #[Route('/verify', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, VerifyEmailHelperInterface $verifyEmailHelper, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        $user = $userRepository->find($request->query->get('id'));
        if (!$user) {
            throw $this->createNotFoundException();
        }
        try {
            $verifyEmailHelper->validateEmailConfirmation(
                $request->getUri(),
                $user->getId(),
                $user->getEmail(),
            );
        } catch (VerifyEmailExceptionInterface $e) {
            $this->addFlash('error', $e->getReason());
            return $this->redirectToRoute('app_register');
        }
        // dd('TODO');
        $user->setIsVerified(true);
        $entityManager->flush();
        $this->addFlash('success', 'Account Verified! You can now log in.');
        return $this->redirectToRoute('app_login');
    }


    #[Route('/profile/{id}', name: 'profil')]
    function profil($id,User $user,UserRepository $userRep,Request $request,EntityManagerInterface $em,UserPasswordHasherInterface $hasher) {
     
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }
        if ($this->getUser() !== $user) {
            return $this->redirectToRoute('app_accueil');
        
        }
        
        $profil = $userRep->find($id);
        $form = $this->createForm(UserProfilType::class,$profil);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($hasher->isPasswordValid($user,$form->getData()->getPlainPassword())) {
               $user = $form->getData();
                $em->persist($user);
                $em->flush();
                return $this->redirectToRoute('app_accueil');
            }else {
                $this->addFlash(
                    'warning',
                    'le mot de pass est incorrect'   
                    );
            }
               
        }
        $formView = $form->createView();

        
          return $this->render('registration/profil.html.twig', [
            'profil' =>$profil,
            'formView' => $formView
        ]);
    }

  #[Route('/delete_user/{id}', name: 'delete_user')]
    function deleteUser($id,UserRepository $userRep,Request $request,EntityManagerInterface $em) {
     
        $profil = $userRep->find($id);
        $em->remove($profil);
        $em->flush();
        $this->addFlash('message','desabonner succes');
        
          return $this->redirectToRoute('app_accueil');
    }

}
