<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 14/12/17
 * Time: 11:05
 */

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="pelicula")
 */
class Pelicula
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=5)
     * @ORM\Column(type="string")
     */
    private $titulo;

    /**
     * @ORM\Column(type="string")
     */
    private $director;

    /**
     * @ORM\Column(type="text")
     */
    private $resumen;


    /**
     * @ORM\ManyToMany(targetEntity="Genero")
     * @var collection|Genero[]
     */

    private $generos;

    /**
     * @ORM\OneToMany(targetEntity="Trailer", mappedBy="peliculaTrailer")
     *
     * @var Collection|Trailer[]
     */

    private $trailers;

    public function __toString()
    {
        return $this->getDirector();
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
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @param mixed $director
     */
    public function setDirector($director)
    {
        $this->director = $director;
    }

    /**
     * @return mixed
     */
    public function getResumen()
    {
        return $this->resumen;
    }

    /**
     * @param mixed $resumen
     */
    public function setResumen($resumen)
    {
        $this->resumen = $resumen;
    }

    /**
     * @return Genero[]|Collection
     */
    public function getGeneros()
    {
        return $this->generos;
    }

    /**
     * @param Genero[]|Collection $generos
     */
    public function setGeneros($generos)
    {
        $this->generos = $generos;
    }

    /**
     * @return Trailer[]|Collection
     */
    public function getTrailers()
    {
        return $this->trailers;
    }

    /**
     * @param Trailer[]|Collection $trailers
     */
    public function setTrailers($trailers)
    {
        $this->trailers = $trailers;
    }



}