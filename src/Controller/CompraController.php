<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Compra; 
use App\Entity\Usuario;
use App\Entity\Producto;

class CompraController extends AbstractController
{
    #[Route('/compra/registro', name: 'app_compra_registro', methods: 'POST')]
    public function compraRegistro(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $usuarioId = $data['usuarioId'];
        $usuario = $entityManager->getRepository(Usuario::class)->find($usuarioId);
        $productoId=  $data['producto'];
        $producto = $entityManager->getRepository(Producto::class)->find($productoId);


        $compra = new Compra();
        $compra->setUsuario($usuario); 
        $compra->setDireccionEnvio($data['direccionEnvio']);
        $compra->setTotalPedido($data['totalPedido']);
        $compra->setProducto($producto);

        try {
            $entityManager->persist($compra);
            $entityManager->flush();

            return $this->json(
                ['message' => 'Factura registrada',
                'id' => $compra->getIdCompra()
            ], 201);
        } catch (\Exception $e) {
            return $this->json(['error' => 'Error al crear la factura'], 400);
        }
    }
}
