<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContaController extends AbstractController
{
    #[Route('/conta/criarConta', name: 'app_conta')]
    public function criarConta(): Response
    {
        return $this->render('conta/criarConta.html.twig', [
            'controller_name' => 'ContaController',
        ]);
    }
}
