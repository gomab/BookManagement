<?php
/**
 * Created by PhpStorm.
 * User: gomab
 * Date: 2/17/18
 * Time: 9:51 PM
 */

namespace App\Controller;


use App\Entity\Book;
use App\Form\BookType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="homepage")
     */
    public function homeAction(Request $request){

        //Creation du livre
        $book = new Book();

        //Recuperation du formulaire
        $form = $this->createForm(BookType::class, $book);

        //Relier l'objet à la requete
        $form->handleRequest($request);

        //SI le formulaire a ete soumis
        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();

            return new Response('Livre ajouté');
        }

        //Génerer html du form creer
        $formView = $form->createView();

        return $this->render('views/home.html.twig', [
            'form' => $formView
        ]);
    }
}