<?php

namespace App\Controller;

use App\Entity\ContactUs;
use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Component\Security\Http\Authenticator\FormLoginAuthenticator;
use App\Repository\UserRepository;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Bridge\Google\Transport;
use Symfony\Component\Mime\Address;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, ManagerRegistry $doctrine, MailerInterface $mailer): Response
    {
        $contactUs = new ContactUS();
        $form = $this->createForm(ContactFormType::class, $contactUs, [
            'action' => $this->generateUrl('app_contact')
        ]);

        $form->handleRequest($request);

        $this->addFlash('info', 'Some useful info');

        // dump($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            // $entityManager = $doctrine->getManager();
            // $entityManager->persist($contactUs);
            // $entityManager->flush();

            $em = $doctrine->getManager();
            $em->persist($contactUs);
            $em->flush();

            //success message
            $this->addFlash('success', 'Votre message a été envoyé!');

            //mailer
            $email = (new Email())
                ->from('lubna.akash@univ-montp3.fr')
                ->to(new Address('lubna.altungi@gmail.com'))
                ->subject('You got mail!')
                ->text('Sending emails is fun again!')
                ->html('<p>See Twig integration for better HTML integration!</p>');

            $mailer->send($email);
        }

        return $this->render('contact/index.html.twig', [
        'our_form' => $form->createView(),
        ]);
    }
}
