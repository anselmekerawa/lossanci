<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class backendController extends Controller
{
    public function indexAction()
    {
        return $this->render("back-end/index.html.twig");
    }
    /* Lost items controller */
    public function itemsAction()
    {
        return $this->render('back-end/allItems.html.twig');
    }

    public function addItemAction()
    {
        return $this->render('back-end/blank.html.twig');
    }

    public function itemsCategoriesAction()
    {
        return $this->render('back-end/itemsCategories.html.twig');
    }
    /* End of lost items controller */
    /* User item controllers*/
    public function usersAction($id)
    {
        if($id == 0)
        {
            return $this->render('back-end/contacts.html.twig');
        }

        return $this->render('back-end/blank.html.twig');
    }

    public function addUserAction()
    {
        return $this->render('back-end/blank.html.twig');
    }

    public function usersCategoriesAction()
    {
        return $this->render('back-end/usersCategories.html.twig');
    }

    public function profileAction()
    {
        return $this->render('back-end/profile.html.twig');
    }
    /* End Users controllers*/

    /* Settings controllers*/
    public function generalAction()
    {
        return $this->render('back-end/general.html.twig');
    }

    public function financeAction()
    {
        return $this->render('back-end/finance.html.twig');
    }

    public function appearanceAction()
    {
        return $this->render('back-end/appearance.html.twig');
    }
    /* End of settings controller */

    /* Mailing controllers */
    public function composeAction()
    {
        return $this->render('back-end/blank.html.twig');
    }
    public function inboxAction()
    {
        return $this->render('back-end/inbox.html.twig');
    }
    public function sentAction()
    {
        return $this->render('back-end/blank.html.twig');
    }
    public function parametersAction()
    {
        return $this->render('back-end/blank.html.twig');
    }
}