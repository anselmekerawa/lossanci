<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Product;
use AppBundle\Entity\Category;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("lucky/number/{count}", name="lucky-number", defaults={"count" : 1})
     */
    public function numberAction($count, Request $request)
    {
        if ($count > 0)
        {
            $number = array();

            for ($i=0; $i < $count ; $i++) 
            { 
                $number[] = rand(0, 999);
            }

            $numberList = implode('-', $number);

            $session = $request->server->get('HTTP_HOST');

            return $this->render('default/number.twig', array('numberList' => $numberList,
                                                                'session' => $session));
        }

        throw $this->createNotFoundException($count. " est un nombre nul. Nous n'avaons pas des pages nulles");
        
    }

    /**
     * @Route("api/lucky/number", name="api-lucky-number")
     */
    public function apiNumberAction()
    {
        $data = array('number' => rand(0, 999));

        return new Response(json_encode($data), 200, array('content-type' => 'application/json'));
    }

    /**
     * @Route("redirect", name="redirect")
     */
    public function redirectAction()
    {
        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("create", name="create")
     */
    public function createAction()
    {
        $product = new product();
        $product->setName('Keyboard');
        $product->setPrice(19.99);
        $product->setDescription('Ergonomic and stylish');

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);

        $em->flush();

        return new Response('Saved product with id '.$product->getId());
    }

    /**
     * @Route("show/{id}", name="show")
     */
    public function showAction($id)
    {
        $repository = $this->getDoctrine()
                            ->getRepository('AppBundle:Product')
                            ->find($id);

        if (!$repository)
        {
            throw $this->createNotFoundException("Le produit avec id ".$id." n'est pas dispo.");
            
        }

        return new Response('Produit dispo');
    }

    /**
     * @Route("create/product/{id}", name="create_product")
     */
    public function createProductAction($id)
    {
        $categorie = new category();
        $categorie->setName('Hardware');

        $repo = $this->getDoctrine()
                    ->getRepository('AppBundle:Product');

        $product = $repo->find($id);
        dump($product);
        if (!$product)
        {
            throw $this->createNotFoundException("Le produit avec id ".$id." n'est pas dispo.");
            
        }
        
        $product->setCategory($categorie);

        $em = $this->getDoctrine()->getManager();
        $em->persist($categorie);
        $em->flush();

        return new Response( 'Saved new product with id: '.$product->getId() .' and new category with id: '.$categorie->getId() );

    }



}
