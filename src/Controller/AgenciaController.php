<?php

namespace App\Controller;

use App\Entity\Agencia;
use App\Form\AgenciaType;
use App\Repository\AgenciaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgenciaController extends AbstractController
{
    #[Route('/agencia', name: 'app_agencia')]
    public function index(AgenciaRepository $agenciaRepository): Response{

        $agencias = $agenciaRepository->findAll();

        return $this->render('agencia/index.html.twig', ['controller_name' => 'Agência', 'agencias' => $agencias]);
    }
    
    #[Route('/agencia/add', name: 'agencia_add')]
    public function add(Request $request, AgenciaRepository $agenciaRepository, EntityManagerInterface $entityManagerInterface) : Response{
        // $agencia = new Agencia();
        $formAgencia = $this->createForm(AgenciaType::class, new Agencia());

            $formAgencia->handleRequest($request);
            if ($formAgencia->isSubmitted() && $formAgencia->isValid()){
                $agencia = $formAgencia->getData();
                // $entityManagerInterface->persist($agencia);
                // $agencia->setCreated(new \DateTime());
                $agenciaRepository->save($agencia, true);
                // dd('foi submetido!');
                $this->addFlash('success', 'Sua Agência foi cadastada!');
                return $this->redirect('/agencia');
            }

        return $this->render('agencia/add.html.twig', ['form' => $formAgencia]);
    }

    // #[Route('/agencia/{agencia}/edit', name: 'agencia_add')]
    // public function edit(Agencia $agencia, Request $request, AgenciaRepository $agenciaRepository, EntityManagerInterface $entityManagerInterface) : Response{

    //     $formAgencia = $this->createFormBuilder($agencia)
    //         ->add('numero')
    //         ->add('nome')
    //         ->add('telefone')
    //         ->add('endereco')
    //         // ->add('submit', SubmitType::class, ['label' => 'Salvar'])
    //         ->getForm();

    //         $formAgencia->handleRequest($request);
    //         if ($formAgencia->isSubmitted() && $formAgencia->isValid()){
    //             $agencia = $formAgencia->getData();
    //             // $entityManagerInterface->persist($agencia);
    //             // $agencia->setCreated(new \DateTime());
    //             $agenciaRepository->save($agencia, true);
    //             // dd('foi submetido!');
    //             $this->addFlash('success', 'Sua Agência foi cadastada!');
    //             return $this->redirect('/agencia');
    //         }

    //     return $this->render('agencia/add.html.twig', ['form' => $formAgencia]);
    // }
}
