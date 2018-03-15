<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use AppBundle\Form\Type\CambiarClaveType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

class UsuarioController extends Controller
{
    /**
     * @Route("/usuario/clave", name="usuarioCambiarClave")
     * @Security("is_granted('ROLE_REGISTRADO')")
     */
    public function cambiarClave(Request $request, UserPasswordEncoder $userPasswordEncoder)
    {
        /** @var Usuario $usuario */
        $usuario = $this->getUser();

        $formulario = $this->createForm(CambiarClaveType::class, $usuario);

        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid()) {
            $textoPlano = $formulario->get('nuevaClave');

            try {
                $usuario->setClave(
                    $userPasswordEncoder->encodePassword($usuario, $textoPlano)
                );
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('info', 'Contraseña cambiada con éxito');

                return $this->redirectToRoute('inicio');
            }
            catch(\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }

        return $this->render('Usuario/clave.html.twig', [
            'formulario' => $formulario->createView()
        ]);
    }
}

