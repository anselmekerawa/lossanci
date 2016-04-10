<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('front-end/index.html.twig');
    }

    /**
     * @Route("searchit", name="searchit")
     */
    public function searchitAction()
    {
        $request = Request::createFromGlobals();
        $q = $request->query->get('q');

        return $this->render("front-end/searchit.html.twig", array('q'=>$q));
    }

    /**
     * @Route("submitit", name="submit")
     */
    public function submititAction()
    {
        return $this->render('front-end/searchit.html.twig');
    }

    /**
     * @Route("login", name="login")
     */
    public function logintAction()
    {
        return $this->render('front-end/searchit.html.twig');
    }

}
