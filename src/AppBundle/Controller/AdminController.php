<?php


namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AdminController extends controller
{

    /**
     * @Route("/admin", name="adminPagina")
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function indexAction()
    {
        return $this->render('admin/admin.html.twig');
    }

}