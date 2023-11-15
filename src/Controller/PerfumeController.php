<?php

namespace App\Controller;
use App\Repository\PerfumeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
#[Route("/api", "api_")]
class PerfumeController extends AbstractController
{
    #[Route('/perfume', name: 'app_perfume')]
    public function index(PerfumeRepository $perfumeRepository): JsonResponse
    { $perfumes = $perfumeRepository->findAll();
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PerfumeController.php',
        ]);
       
    }
   
        

   
    
}


