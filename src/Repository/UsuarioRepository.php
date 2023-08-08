<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Usuario; 

class UsuarioRepository extends ServiceEntityRepository{

    public function __construct(ManagerRegistry $registry){
        parent::__construct($registry, Usuario::class);
    }

    public function findAllUsuarios()
    {
        return $this->createQueryBuilder('u')
            ->getQuery()
            ->getResult();
    }

    
}