<?php
/**
 * Created by PhpStorm.
 * User: gomab
 * Date: 2/19/18
 * Time: 9:59 PM
 */

namespace App\Controller;


use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     *
     * @Route("addCat", name="addCategory")
     */
    public function addCategory(Request $request){
        //Create Category
        $category = new Category();

        //Create Form
        $form = $this->createForm(CategoryType::class, $category);

        //Link object to Request
        $form->handleRequest($request);

        //
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            //return new Response('Categorie cree');
            return $this->redirect('displayCategory');
        }

        //Generation du html form
        $createViews = $form->createView();

        return $this->render('views/addCategory.html.twig', [
            'form' => $createViews
        ]);

    }

    /**
     * //Afficher Category
     *
     * @return Response
     *
     * @Route("/displayCategory", name="displayCategory")
     */
    public function displayCategory(){
       $repository = $this->getDoctrine()->getRepository(Category::class);
       $category = $repository->findAll();

       return $this->render('views/displayCategory.html.twig', [
           'categorys' => $category
       ]);
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     *
     * @Route("/displayCategory/edit/{id}", name="editCategory", requirements={"name": "[a-zA-Z]+", "age": "[0-9]+"})
     */
    public function editCategory(Request $request, Category $category){

        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            //Return $this->redirect('displayCategory');
            //Return $this->redirectToRoute('displayCategory', array('name' => 'jean', 'age' => 42));

            //Erreur 404
            //throw $this->createNotFoundException('Cette page n\'existe pas');
            
            //Erreur 500
            //throw new \Exception("Une erreur est suevenue");

            /**
             * $response = new Response('une erreur produit');
             * $response->setStatusCode(500);
             * return $response;
             */
            //Return new Response('Cate modifie');
            Return $this->redirectToRoute('displayCategory');
        }

        $formViews = $form->createView();

        return $this->render('views/editCategory.html.twig', [
            'form' => $formViews
        ]);
    }

    /**
     * @param Category $category
     * @return Response
     *
     * @Route("/displayCategory/delete/{id}", name="deleteCategory")
     */
    public function deleteCategoryAction(Category $category){
        $em = $this->getDoctrine()->getManager();
        $em->remove($category);
        $em->flush();

        //Return new Response('cat sup');
        return $this->redirectToRoute('displayCategory');

    }
}