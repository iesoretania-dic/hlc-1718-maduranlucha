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
     * @ORM\Column(type="string")
     */
    private $titulo;

    /**
     * @ORM\Column(type="string")
     */
    private $director;

    /**
     * @ORM\Column(type="string")
     */
    private $resumen;


}