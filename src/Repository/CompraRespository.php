<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Compra; 

class CompraRepository extends ServiceEntityRepository{

    public function __construct(ManagerRegistry $registry){
        parent::__construct($registry, Compra::class);
    }

    public function registroCompra()
    {
        return $this->createQueryBuilder('u')
            ->getQuery()
            ->getResult();
    }

    
    
}