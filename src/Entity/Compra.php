<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compra
 *
 * @ORM\Table(name="compra", indexes={@ORM\Index(name="fk_compra_producto", columns={"producto_id"}), @ORM\Index(name="fk_compra_usuario", columns={"usuario_id"})})
 * @ORM\Entity
 */
class Compra
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_compra", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCompra;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion_envio", type="string", length=100, nullable=false)
     */
    private $direccionEnvio;

    /**
     * @var float
     *
     * @ORM\Column(name="total_pedido", type="float", precision=10, scale=0, nullable=false)
     */
    private $totalPedido;

    /**
     * @var \Producto
     *
     * @ORM\ManyToOne(targetEntity="Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="producto_id", referencedColumnName="id_producto")
     * })
     */
    private $producto;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id_usuario")
     * })
     */
    private $usuario;

    public function getIdCompra(): ?int
    {
        return $this->idCompra;
    }

    public function getDireccionEnvio(): ?string
    {
        return $this->direccionEnvio;
    }

    public function setDireccionEnvio(string $direccionEnvio): static
    {
        $this->direccionEnvio = $direccionEnvio;

        return $this;
    }

    public function getTotalPedido(): ?float
    {
        return $this->totalPedido;
    }

    public function setTotalPedido(float $totalPedido): static
    {
        $this->totalPedido = $totalPedido;

        return $this;
    }

    public function getProducto(): ?Producto
    {
        return $this->producto;
    }

    public function setProducto(?Producto $producto): static
    {
        $this->producto = $producto;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): static
    {
        $this->usuario = $usuario;

        return $this;
    }


}
