<?php

namespace App\Controller\Adimin;

use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/categories', name: 'admin_categories_')]

class CategorieController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategoriesRepository $CategoriesRepository): Response
    {
        $categories = $CategoriesRepository->findBy([],['categoryOrder'=>'asc']);
        return $this->render('admin/categorie/index.html.twig', compact('categories') );
    }
}
