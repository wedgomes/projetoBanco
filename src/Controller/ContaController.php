<?php

namespace App\Controller;

use App\Entity\Conta;
use App\Entity\User;
use App\Form\ContaType;
use App\Form\UserType;
use App\Repository\ContaRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContaController extends AbstractController
{
    #[Route('/conta', name: 'app_conta')]
    public function criarConta(ContaRepository $contaRepository): Response{
        
        $contas = $contaRepository->findAll();

        return $this->render('conta/index.html.twig', ['controller_name' => 'ContaController', 'contas' => $contas]);
    }

    #[Route('/conta/adc', name: 'conta_add')]
    public function add(Request $request, ContaRepository $contaRepository, UserRepository $userRepository) : Response{

        $formConta = $this->createForm(ContaType::class, new Conta());
        $userForm = $this->createForm(UserType::class, new User());

            $formConta->handleRequest($request);
            $userForm->handleRequest($request);

            if (($formConta->isSubmitted() && $formConta->isValid()) && ($userForm->isSubmitted() && $userForm->isValid())){
                $usuario = $userForm->getData();
                
                $userRepository->save($usuario, true);

                $conta = $formConta->getData();
                $contaRepository->save($conta, true);
                return $this->redirect('index/index.html.twig');
            }

        return $this->render('conta/criarConta.html.twig', ['contaForm' => $formConta, 'userForm' => $userForm],);
    }
}
