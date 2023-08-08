<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductoRepository;

class ProductoController extends AbstractController
{
    #[Route('/producto/verProductos', name: 'app_producto', methods:'GET')]
    public function verProductos(ProductoRepository $productoRepository): JsonResponse
    {
        $productos = $productoRepository->findAllProductos();

       
        $productosArray = [];
        foreach ($productos as $producto) {
            $productosArray[] = [
                'id' => $producto->getIdProducto(),
                'nombreProducto' => $producto->getNombreProducto(),
                'cantidadesDisponibles' => $producto->getCantidadDisponible(),
                'precioUnitario' => $producto->getPrecioUnitario()
            ];
        }

        return $this->json($productosArray);
    }

    #[Route('/producto/buscar', name: 'buscar_productos', methods: 'GET')]
    public function buscarProductos(Request $request, ProductoRepository $productoRepository): JsonResponse
    {
        $jsonContent = $request->getContent();
        $data = json_decode($jsonContent, true);
        $nombre = $data['nombre'];

        $productos = $productoRepository->findByNombre($nombre);

        $productosArray = [];
        foreach ($productos as $producto) {
            $productosArray[] = [
                'id' => $producto->getIdProducto(),
                'nombre' => $producto->getNombreProducto(),
                'cantidadDisponible' =>$producto->getCantidadDisponible(),
                'precioUnitario'=>$producto->getPrecioUnitario()
                
            ];
        }

        return $this->json($productosArray);
    }
}
