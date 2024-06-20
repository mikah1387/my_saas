<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/', name: 'main_')]
class MainController extends AbstractController
{
    #[Route('/', name: 'index')]

    public function index(UsersRepository $userRepo): Response
    {
        return $this->render('main/index.html.twig', [
            'users' => $userRepo->findBy([], ['id' => 'DESC'], 5),
        ]);
    }
}
