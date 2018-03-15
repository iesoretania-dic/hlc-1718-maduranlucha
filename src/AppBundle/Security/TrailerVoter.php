<?php

namespace AppBundle\Security;

use AppBundle\Entity\Trailer;
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManagerInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;


class TrailerVoter extends Voter
{
    const VER = 'TRAILER_VER';
    const NUEVO = 'TRAILER_NUEVO';
    const MODIFICAR = 'TRAILER_MODIFICAR';
    const ELIMINAR = 'TRAILER_ELIMINAR';

    private $decisionManager;

    public function __construct(AccessDecisionManagerInterface $decisionManager)
    {
        $this->decisionManager = $decisionManager;
    }

    /**
     * {@inheritdoc}
     */
    protected function supports($attribute, $subject)
    {
        // indicar si el Voter soporta el atributo y el sujeto indicados

        // si el sujeto no es una idea, devolver false
        if (!$subject instanceof Trailer) {
            return false;
        }

        // si no es uno de los atributos definidos arriba, devolver false
        if (!in_array($attribute, [self::VER, self::NUEVO, self::MODIFICAR ,self::ELIMINAR], true)) {
            return false;
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        // si estamos aquí, es seguro que el sujeto es una idea y el atributo uno de los definidos arriba

        $user = $token->getUser();

        if (!$user instanceof Usuario) {
            // debería haber un usuario activo en la aplicación, denegar si no es así
            return false;
        }

        // LOS ADMIN TIENEN PERMISO TOTAL
        if ($this->decisionManager->decide($token, ['ROLE_ADMIN'])) {
            return true;
        }

        switch ($attribute) {
            case self::VER:
                return $this->puedeVer($subject, $token, $user);
            case self::NUEVO:
                return $this->puedeAgregar($subject, $token, $user);
            case self::MODIFICAR:
                return $this->puedeModificar($subject, $token, $user);
            case self::ELIMINAR:
                return $this->puedeEliminar($subject, $token, $user);
        }

        // por defecto, denegar el permiso
        return false;
    }

    private function puedeVer(Trailer $trailer, TokenInterface $token, Usuario $user)
    {
        // los usuario deben estar registrador para ver los trailers
        return $this->decisionManager->decide($token, ['ROLE_REGISTRADO']);
    }

    private function puedeAgregar(Trailer $trailer, TokenInterface $token, Usuario $user)
    {
       // solo los administradores pueden añadir nuevos trailers
        return $this->decisionManager->decide($token, ['ROLE_ADMIN']);
    }


    private function puedeModificar(Trailer $trailer, TokenInterface $token, Usuario $user)
    {

        return $this->decisionManager->decide($token, ['ROLE_ADMIN']);
    }

    private function puedeEliminar(Trailer $trailer, TokenInterface $token, Usuario $user)
    {
        // solo los administradores y los moderadores pueden eliminar los trailers

        return $this->decisionManager->decide($token, ['ROLE_MODERADOR']);
    }

}