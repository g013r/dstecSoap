<?php
namespace app\models;

class Inventario
{
    private $id_inventario;
    private $id_producto;
    private $id_ubicacion;
    private $stock_actual;
    private $stock_minimo;

    public function __construct(array $datos = [])
    {
        if (!empty($datos)) {
            $this->id_inventario = $datos['id_inventario'] ?? null;
            $this->id_producto = $datos['id_producto'] ?? null;
            $this->id_ubicacion = $datos['id_ubicacion'] ?? null;
            $this->stock_actual = $datos['stock_actual'] ?? null;
            $this->stock_minimo = $datos['stock_minimo'] ?? 0;
        }
    }
}