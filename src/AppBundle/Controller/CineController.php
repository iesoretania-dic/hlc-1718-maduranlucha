<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CineController extends Controller
{
    /**
     * @Route("/cine", name="cinemostrar")
     */

    public function cineMostrar()
    {
        $peliculas = [

            ['titulo' =>'Armageddon','director' => 'Michael Bay','genero' => 'Ciencia Ficcion','duracion' => '150 Minutos', 'calidad' => 'DVD','imagen' => 'img/armageddon.jpg'],
            ['titulo' =>'Salvar al soldado Ryan','director' => 'Steven Spilverg','genero' => 'Belico','duracion' => '169 Minutos', 'calidad' => 'BlueRay', 'imagen' => 'img/ryan.jpg'],
            ['titulo' =>'La lista de Schindler','director' => 'Steven Spilverg','genero' => 'Drama','duracion' => '196 Minutos', 'calidad' => 'DVD', 'imagen' => 'img/lista.jpg'],
            ['titulo' =>'Terminator','director' => 'James Cameron','genero' => 'Ciencia Ficcion','duracion' => '108 Minutos', 'calidad' => 'UHD', 'imagen' => 'img/terminator.jpg']

        ];

        return $this->render('cineworld/mostrar.html.twig',[
            'peliculas' => $peliculas
        ]);
    }
}
