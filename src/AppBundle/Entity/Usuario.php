<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */
class Usuario
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
     * @ORM\Column(type="string")
     */
    private $nombre;

    /**
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     */
    private $clave;

    /**
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
     *
     *
     * @var collection|Pelicula[]
     */

    private $peliculas;

    /**
     * @ORM\OneToMany(targetEntity="Comentario", mappedBy="autorComentario")
     *
     * @var Collection|Comentario[]
     */

    private $comentariosPropuestos;

    /**
     * @ORM\Column(type="string")
     */
    private $edad;

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
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * @param mixed $edad
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

}