<?php

namespace App\Controller;

use App\Entity\Products;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cart', name: 'cart_')]

class CartController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(SessionInterface $session, ProductsRepository $ProductsRepository): Response
    {
        $panier = $session->get("Panier",[]);
        // on fabrique les données 
        $datapanier = [];
        $total = 0;

        foreach($panier as $id => $quantite)
        {
            $product = $ProductsRepository->find($id);
            $datapanier[] = [
                'produit'=> $product,
                'total' => $quantite
            ];

            $total+= $product->getPrice()*$quantite;



        }
        return $this->render('cart/index.html.twig',[
            'datapanier'=>$datapanier,
            'total'=>$total
        ]);
    }


    #[Route('/add/{id}', name: 'add')]
    public function add(Products $product, SessionInterface $session): Response
    {
        // on recupere le panier actuelle 

        $panier = $session->get("Panier",[]);
        $id = $product->getId();

        if (!empty($panier[$id]))
        {
            $panier[$id]++;  

        }else {
            $panier[$id] = 1;
            
        }
        // on sevegarde la session 
        $session->set("Panier",$panier);

        return $this-> redirectToRoute('cart_index');
    }

    #[Route('/remove/{id}', name: 'remove')]
    public function remove(Products $product, SessionInterface $session)
    {
        $panier = $session->get("Panier",[]);
        $id = $product->getId();

        if(!empty($panier[$id]))
        {
            if($panier[$id]>1){
                $panier[$id]--;
            }else {
                unset($panier[$id]);
            }
        }
        // on sauvegarde dans la session
        $session->set("Panier",$panier);
        return $this-> redirectToRoute('cart_index');
    }


    #[Route('/delete/{id}', name: 'delete')]
    public function delete(Products $product, SessionInterface $session)

    {
        // on recupere le panier actuelle 

        $panier = $session->get("Panier",[]);
        $id = $product->getId();

        if(!empty($panier[$id]))
        {
            unset($panier[$id]);
        }

        // on sauvegarde dans la session
        $session->set("Panier",$panier);
        return $this-> redirectToRoute('cart_index');


    }

    public function deleteAll(SessionInterface $session)

    {

        $session->remove("panier");
        
        return $this-> redirectToRoute('cart_index');  

    }
}
