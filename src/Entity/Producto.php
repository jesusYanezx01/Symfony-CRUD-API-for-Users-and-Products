<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity
 */
class Producto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_producto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_producto", type="string", length=100, nullable=false)
     */
    private $nombreProducto;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad_disponible", type="integer", nullable=false)
     */
    private $cantidadDisponible;

    /**
     * @var float
     *
     * @ORM\Column(name="precio_unitario", type="float", precision=10, scale=0, nullable=false)
     */
    private $precioUnitario;

    public function getIdProducto(): ?int
    {
        return $this->idProducto;
    }

    public function getNombreProducto(): ?string
    {
        return $this->nombreProducto;
    }

    public function setNombreProducto(string $nombreProducto): static
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    public function getCantidadDisponible(): ?int
    {
        return $this->cantidadDisponible;
    }

    public function setCantidadDisponible(int $cantidadDisponible): static
    {
        $this->cantidadDisponible = $cantidadDisponible;

        return $this;
    }

    public function getPrecioUnitario(): ?float
    {
        return $this->precioUnitario;
    }

    public function setPrecioUnitario(float $precioUnitario): static
    {
        $this->precioUnitario = $precioUnitario;

        return $this;
    }


}
