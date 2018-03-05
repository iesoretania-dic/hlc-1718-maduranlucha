<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 4/03/18
 * Time: 2:05
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="genero")
 */

class Genero
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

    private $nombre;

    // Convertir a cadena

    public function __toString()
    {
        return $this->getNombre();
    }


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





}