<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 14/12/17
 * Time: 11:05
 */

namespace AppBundle\Entity;

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

}