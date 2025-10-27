<?php

class Ventas{
    private $id_venta;
    private $id_usuario;
    private $fecha_venta;
    private $total;
    private $estado;

    public function __construct(array $datos = [])
    {
        if (!empty($datos)) {
            $this->id_venta = $datos['id_venta'];
            $this->id_usuario = $datos['id_usuario'];
            $this->fecha_venta = $datos['fecha_venta'];
            $this->total = $datos['total'];
            $this->estado = $datos['estado'];
        }
    }
}