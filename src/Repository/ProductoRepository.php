<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Producto; 

class ProductoRepository extends ServiceEntityRepository{

    public function __construct(ManagerRegistry $registry){
        parent::__construct($registry, Producto::class);
    }

    public function findAllProductos()
    {
        return $this->createQueryBuilder('u')
            ->getQuery()
            ->getResult();
    }

    public function findByNombre($nombre)
    {
        return $this->createQueryBuilder('p')
        ->where('p.nombreProducto LIKE :nombre')
        ->setParameter('nombre', '%' . $nombre . '%')
        ->getQuery()
        ->getResult();
    }

    
}