<?php

class Servicios
{
    private $id_servicio;
    private $nombre;
    private $descripcion;
    private $precio;
    private $estado;

    public function __construct(array $datos = [])
    {
        if (!empty($datos)) {
            $this->id_servicio = $datos['id_servicio'];
            $this->nombre = $datos['nombre'];
            $this->descripcion = $datos['descripcion'];
            $this->precio = $datos['precio'];
            $this->estado = $datos['estado'];
        }
    }
}
