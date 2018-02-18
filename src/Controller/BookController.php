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
     * Add Book
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/addBook", name="addBook")
     */
    public function addBookAction(Request $request){

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

        return $this->render('views/addBook.html.twig', [
            'form' => $formView
        ]);
    }

    /**
     * Display Book
     *
     * @Route("/", name="displayBook")
     */
    public function displayBookAction(){
        $repository = $this->getDoctrine()->getRepository(Book::class);

        $book = $repository->findAll();

        return $this->render('views/displayBook.html.twig', [
            'books' => $book
        ]);
    }

    /**
     * Edit book
     *
     * @param Request $request
     * @return Response
     *
     * @Route("/displayBook/edit/{id}", name="editBook")
     */
    public function editBookAction(Request $request, Book $book){

        //Create form
        $form = $this->createForm(BookType::class, $book);

        //To link object to request
        $form->handleRequest($request);

        //Send form
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return new Response('Book modifie');
        }

        //Generate html form
        $formView = $form->createView();

        //rendu de la vue
        return $this->render('views/editBook.html.twig', [
            'form' => $formView
        ]);

    }
}