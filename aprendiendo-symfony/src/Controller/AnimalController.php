<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Animal;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Email;

use App\Form\AnimalType;

class AnimalController extends AbstractController
{
    public function index()
    {
        $animal_repo = $this->getDoctrine()->getRepository(Animal::class);

        $animales = $animal_repo->findAll();

        /* $animal = $animal_repo->findOneBy([
            'tipo' => 'Vaca'
        ]); */

        /* $animal = $animal_repo->findBy([
            'raza' => 'Africana'
       ],[
           'id' => 'desc'
        ]);*/

        //Repositorio
        $animals = $animal_repo->findByRaza('desc');

        //DQL
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT a FROM App\Entity\Animal a WHERE a.zara = 'americana' ";
        $query = $em->createQuery($dql);
        $resultDQL = $query->execute();

        //SQL
        $conection = $this->getDoctrine()->getConnection();
        $sql = 'SELECT * FROM animales ORDER BY id desc';
        $prepare = $conection->prepare($sql);
        $prepare->execute();
        $resultSQL = $prepare->fetch();

        return $this->render('animal/index.html.twig', [
            'controller_name' => 'AnimalController',
            'animales' => $animales
        ]);
    }

    public function save()
    {
        //Guardar en la tabla

        //Cargo el entity manager
        $entityManager = $this->getDoctrine()->getManager();

        //Creo el objeto animal
        $animal = new Animal();
        $animal->setTipo('Aveztruz');
        $animal->setColor('verde');
        $animal->setRaza('Africana');

        //Guardar objeto en Doctrine
        $entityManager->persist($animal);

        //Volcar datos en la tabla.
        $entityManager->flush();

        return new Response('El animal guardado tiene el id: ' . $animal->getId());
    }

    public function animal(Animal $animal)
    {

        /*  //cargar repositorio
        $animal_repo = $this->getDoctrine()->getRepository(Animal::class);

        //consulta
        $animal = $animal_repo->find($id);

        //Comprobar si es correcto
        */

        if (!$animal) {
            $message = 'El animal no existe';
        } else {
            $message = 'El animal elegido es: ' . $animal->getTipo();
        }

        return new Response($message);
    }

    public function update($id)
    {

        //doctrines
        $doctrine = $this->getDoctrine();

        //entity mana
        $em = $doctrine->getManager();

        //cargar repositorio
        $animal_repo = $em->getRepository(Animal::class);


        //consulta
        $animal = $animal_repo->find($id);

        if (!$animal) {
            $message = "El animal no existe en la BD";
        } else {

            //asignar valores
            $animal->setTipo('Perro');
            $animal->setColor('Negro');

            $em->persist($animal);

            //Volcar datos en la tabla.
            $em->flush();

            $message = 'Has actualizado el animal: ' . $animal->getTipo();
        }
        return new Response($message);
    }

    public function delete(Animal $animal)
    {

        $em = $this->getDoctrine()->getManager();

        if ($animal && is_object($animal)) {
            $em->remove($animal);
            $em->flush();

            $message = "Borrado";
        } else {
            $message = "No existe!";
        }

        return new Response($message);
    }

    public function crearAnimal(Request $request)
    {
        $animal = new Animal();
        $form = $this->createForm(AnimalType::class,$animal);
            
            

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($animal);
            $em->flush();

            //Sesion flash
            $session = new Session();
            $session->getFlashBag()->add('message','Animal creado');

            return $this->redirectToRoute('crear_animal');
        }
        return $this->render('animal/crear-animal.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function validarEmail($email){
       $validator = Validation::createValidator();
       $errores = $validator->validate($email,[
           new Email()
       ]);
       
       if(count($errores) != 0){
           echo "El dato no se ha validado";
       }
       else{
        echo "El dato  se ha validado";
       }
        die();
    }

}
