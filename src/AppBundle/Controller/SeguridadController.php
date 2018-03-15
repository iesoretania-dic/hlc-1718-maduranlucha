<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 15/03/18
 * Time: 17:01
 */

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SeguridadController extends controller
{

    /**
     * @Route("/logeo", name="pagina_logeo")
     */
    public function entrarAction(AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $ultimoUsuario = $authUtils->getLastUsername();

        return $this->render('seguridad/logeo.html.twig',[
            'ultimo_usuario' => $ultimoUsuario,
            'error' => $error,
        ]);
    }

    /**
     * @Route("/salir", name="usuario_salir")
     */
    public function salirAction()
    {
        // no es necesario ya se encarga symfony.
    }

}