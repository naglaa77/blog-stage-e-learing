<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use App\Entity\User;

class AproposController extends AbstractController
{
    #[Route('/apropos', name: 'app_apropos')]
    public function index(): Response
    {

        $latestUsers = $this->userRepository
        ->findLatest();

        return $this->render('apropos/index.html.twig', [
            'controller_name' => 'AproposController',
            'latestUsers' => $latestUsers,
        ]);
    }

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
}
