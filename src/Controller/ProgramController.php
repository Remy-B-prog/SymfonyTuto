<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/program', name: 'program_')]
class ProgramController extends AbstractController
{

    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('program/program.html.twig', [
            'website' => 'Wild Series',
         ]);
    }

    #[Route('/{id}', name: 'id', requirements: ['page'=>'<\d+>'], methods: ['GET'] )]
    
    public function show(int $id) : Response 
    {
        
        return $this->render('program/_show.html.twig', ['id' => $id]);
    }
    
}