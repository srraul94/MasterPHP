<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'hello' => 'Hola Mundo Symfony!'
        ]);
    }

    public function animales($nombre,$apellidos){
        $title = "Bienvenido a animales";
        $animales = array('Perro','Gato','Paloma','Rata');
        $aves = array(
            'tipo' => 'palomo',
            'color' => 'gris',
            'edad' => 4,
            'estado' => 'feo'
        );

        return $this->render('home/animales.html.twig', [
            'title' => $title,
            'nombre'=> $nombre,
            'apellidos' => $apellidos,
            'animales' => $animales,
            'aves' => $aves
        ]);
    }

    public function redirigir(){
        return $this->redirectToRoute('animales',[
            'nombre'=> 'Paco',
            'apellidos' => 'Lopez'
        ]);

        //return $this->redirect('http://www.google.es');
    }
}
