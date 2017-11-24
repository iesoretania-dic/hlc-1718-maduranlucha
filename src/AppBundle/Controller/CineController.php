<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CineController extends Controller
{
    /**
     * @Route("/cine", name="cinemostrar")
     */

    public function listarAction()
    {
        return $this->render('cineworld/mostrar.html.twig');
    }
}
