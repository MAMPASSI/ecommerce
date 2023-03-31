<?php

namespace App\Controller\Adimin;

// use App\Entity\Images;
// use App\Entity\Products;
// use App\Form\ProductsFormType;
// use App\Repository\ProductsRepository;
// use App\Service\PictureService;
// use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\String\Slugger\SluggerInterface;

//#[Route('/admin/produits', name: 'admin_products')]

// class ProductController extends AbstractController
// {
//     #[Route('/nick', name: 'index')]
//     public function index(ProductsRepository $ProductsRepository): Response
//     {
//         $produits = $ProductsRepository->findAll();

//         return $this->render('admin/products/index.html.twig' );
//     }

//     // #[Route('/ajout', name: 'add')]
//     // public function add(Request $request, EntityManager $em, SluggerInterface $slugger, PictureService $pictureService)
//     // {
//     //     $this->denyAccessUnlessGranted('ROLE_ADMIN');
//     //     //on crée un nouveau produit
//     //     $product = new Products();
//     //     // on crée le formulaire 
//     //     $productForm = $this->createForm(ProductsFormType::class, $product);
//     //     $productForm->handleRequest($request);

//     //     //on verifie si le formulaire est soumise 

//     //     if($productForm->isSubmitted() && $productForm->isValid())
//     //     {
//     //         // on recupere les images 
//     //         $images = $productForm->get('images')->getData();

//     //         foreach($images as $image)
//     //         {
//     //             // on defini le dossier se destination
//     //             $folder ='Products';
//     //             //on appele le service d'ajout
//     //             $ficher = $pictureService->add($image, $folder,300,300);

//     //             $img = new Images();
//     //             $img->setName($ficher);
//     //             $product->addImage($img);

//     //         }
//     //         // on gere le slug 
//     //         $slug=$slugger->slug($product->getName());
//     //         $product->setSlug($slug);

//     //         // on arrondit le prix 
//     //         //$prix=$product->getPrice()*100;
//     //         // $product->setPrice($prix);

//     //         //on stocke

//     //         $em->persist($product);
//     //         $em->flush();

//     //         $this->addFlash("success","produit ajouter avec succès");

//     //         return $this->redirectToRoute('admin_products_index');


//     //     }
//     //     return $this->render('admin/products/add.html.twig', compact('productForm'));

//     // }
    
    
//}

class ProductsController extends AbstractController
{
    #[Route('/nick', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }
}
