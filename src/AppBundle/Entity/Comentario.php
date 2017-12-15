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
 * @ORM\Table(name="comentario")
 */
class Comentario
{
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
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * @param mixed $contenido
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $contenido;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="comentariosPropuestos")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Usuario
     */

    private $autorComentario;

    /**
     * @return mixed
     */
    public function getAutorComentario()
    {
        return $this->autorComentario;
    }

    /**
     * @param mixed $autorComentario
     */
    public function setAutorComentario($autorComentario)
    {
        $this->autorComentario = $autorComentario;
    }

    /**
     * @return mixed
     */
    public function getAutorComenterio()
    {
        return $this->autorComentario;
    }


}