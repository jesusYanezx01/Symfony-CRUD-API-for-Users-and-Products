<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UsuarioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use App\Entity\Usuario; 

class UsuarioController extends AbstractController
{
    //El siguiente endpoint muestra una lista de los usuarios registrados
    #[Route('/usuario/verUsuarios', name: 'app_usuario', methods:'GET')]
    public function verUsuarios(UsuarioRepository $usuarioRepository): JsonResponse
    {
        $usuarios = $usuarioRepository->findAllUsuarios();

       
        $usuariosArray = [];
        foreach ($usuarios as $usuario) {
            $usuariosArray[] = [
                'id' => $usuario->getIdUsuario(),
                'nombre' => $usuario->getNombre(),
                'email' => $usuario->getEmail(),
            ];
        }

        return $this->json($usuariosArray);
    }

    
    #[Route('/usuario/crearusuario', name: 'app_usuario_crear', methods: 'POST')]
    public function crearUsuario(UsuarioRepository $usuarioRepository, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {

        
        $data = json_decode($request->getContent(), true);

        $usuario = new Usuario();
        $usuario->setNombreUsuario($data['nombreUsuario']);
        $usuario->setNombre($data['nombre']);
        $usuario->setEmail($data['email']);
        $usuario->setContraseña($data['contraseña']);
        $usuario->setDireccion($data['direccion']);
        $usuario->setTelefono($data['telefono']);
        $usuario->setAutorizacion($data['autorizacion']); 

        
        try {
            $entityManager->persist($usuario);
            $entityManager->flush();

            return $this->json(['message' => 'Usuario creado correctamente'], 201);
        } catch (\Exception $e) {
            return $this->json(['error' => 'Error al crear el usuario'], 400);
        }
     
    }

    
}



