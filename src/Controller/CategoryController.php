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
}