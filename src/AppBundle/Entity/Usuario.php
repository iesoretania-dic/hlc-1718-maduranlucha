<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */
class Usuario implements UserInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $alias;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=5)
     * @ORM\Column(type="string")
     */
    private $nombre;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $clave;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="boolean")
     */
    private $administrador;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="boolean")
     */
    private $anonimo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $registrado;

    /**
     * @ORM\Column(type="boolean")
     */
    private $moderador;

    /**
     * @ORM\ManyToMany(targetEntity="Pelicula")
     * @var collection|Pelicula[]
     */

    private $peliculas;

    /**
     * @ORM\OneToMany(targetEntity="Comentario", mappedBy="autorComentario")
     *
     * @var Collection|Comentario[]
     */

    private $comentariosPropuestos;

//    Getters and Setters

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param mixed $alias
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    /**
     * @return mixed
     */
    public function getAnonimo()
    {
        return $this->anonimo;
    }

    /**
     * @param mixed $anonimo
     */
    public function setAnonimo($anonimo)
    {
        $this->anonimo = $anonimo;
    }

    /**
     * @return mixed
     */
    public function getRegistrado()
    {
        return $this->registrado;
    }

    /**
     * @param mixed $registrado
     */
    public function setRegistrado($registrado)
    {
        $this->registrado = $registrado;
    }

    /**
     * @return bool
     */
    public function isRegistrado()
    {
        return $this->registrado;
    }

    /**
     * @return mixed
     */
    public function getModerador()
    {
        return $this->moderador;
    }

    /**
     * @param mixed $moderador
     */
    public function setModerador($moderador)
    {
        $this->moderador = $moderador;
    }

    /**
     * @return bool
     */
    public function isModerador()
    {
        return $this->moderador;
    }


    /**
     * @return Comentario[]|Collection
     */
    public function getComentariosPropuestos()
    {
        return $this->comentariosPropuestos;
    }

    /**
     * @param Comentario[]|Collection $comentariosPropuestos
     */
    public function setComentariosPropuestos($comentariosPropuestos)
    {
        $this->comentariosPropuestos = $comentariosPropuestos;
    }

    public function __construct()
    {
        $this->comentariosPropuestos = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getNombre();
    }

    /**
     * @return Pelicula[]|Collection
     */
    public function getPeliculas()
    {
        return $this->peliculas;
    }

    /**
     * @param Pelicula[]|Collection $peliculas
     */
    public function setPeliculas($peliculas)
    {
        $this->peliculas = $peliculas;
    }

    /**
     * @return mixed
     */
    public function getAdministrador()
    {
        return $this->administrador;
    }

    /**
     * @param mixed $administrador
     */
    public function setAdministrador($administrador)
    {
        $this->administrador = $administrador;
    }

    /**
     * @return bool
     */
    public function isAdministrador()
    {
        return $this->administrador;
    }

    // Metodos de interface

    public function getRoles()
    {
        // TODO: Implement getRoles() method.
        $roles = ['ROLE_USER'];

        if ($this->isAdministrador()) {
            $roles[] = 'ROLE_ADMIN';
        }

        if ($this->isModerador()) {
            $roles[] = 'ROLE_MODERADOR';
        }

        if ($this->isRegistrado()) {
            $roles[] = 'ROLE_REGISTRADO';
        }

        return $roles;
    }

    public function getPassword()
    {
        // TODO: Implement getPassword() method.
        return $this->getClave();
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
        return null;
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
        return $this->getNombre();
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }


}