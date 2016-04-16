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
     * @Route("search", name="search")
     */
    public function searchAction()
    {
        $request = Request::createFromGlobals();
        $q = $request->query->get('q');

        return $this->render("front-end/search.html.twig", array('q'=>$q));
    }

    /**
     * @Route("submit", name="submit")
     */
    public function submititAction()
    {
        return $this->render('front-end/submit.html.twig');
    }

    /**
     * @Route("login", name="login")
     */
    public function logintAction()
    {
        return $this->render('back-end/login.html.twig');
    }

}
