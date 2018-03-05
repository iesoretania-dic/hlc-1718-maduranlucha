<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 4/03/18
 * Time: 2:46
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="trailer")
 */

class Trailer
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=6)
     * @ORM\Column(type="string")
     */
    private $nombre;

    /**
     * @Assert\NotBlank()
     * @Assert\Range(
     *      min = 2,
     *      max = 8,
     *      minMessage = "La duracion mínima es 2",
     *      maxMessage = "La duracion máxima es 8"
     * )
     * @ORM\Column(type="integer")
     */
    private $duracion;

    /**
     * @Assert\Length(min=6)
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $idioma;

    /**
     * @ORM\ManyToOne(targetEntity="Pelicula", inversedBy="trailers")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Pelicula
     */

    private $peliculaTrailer;

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
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * @param mixed $duracion
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }

    /**
     * @return mixed
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * @param mixed $idioma
     */
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;
    }

    /**
     * @return Pelicula
     */
    public function getPeliculaTrailer()
    {
        return $this->peliculaTrailer;
    }

    /**
     * @param Pelicula $peliculaTrailer
     */
    public function setPeliculaTrailer($peliculaTrailer)
    {
        $this->peliculaTrailer = $peliculaTrailer;
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