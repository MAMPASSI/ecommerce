<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CategoriesRepository $CategoriesRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'categories'=>$CategoriesRepository->findBy([],[
                'categoryOrder'=>'asc'
            ])
        ]);
    }
}
