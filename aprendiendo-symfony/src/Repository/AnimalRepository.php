<?php

namespace App\Repository;

use App\Entity\Animal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class AnimalRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Animal::class);
    }

    public function findByRaza($order)
    {
        //Query builder
        $qb = $this->createQueryBuilder('a')
            //->andWhere("a.raza = 'americana'")
            - setParameter('raza', 'americana')
            ->getQuery();

        $resulset = $qb->execute();

        $coleccion = array(
            'name' => 'Coleccion de animales',
            'animales' => $resulset
        );

        return $resulset;
    }
}
