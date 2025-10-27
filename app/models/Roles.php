<?php

class Roles{
    private $id_rol;
    private $nombre;
    private $descripcion;
    private $estado;

    public function __construct(array $datos = [])
    {
        if (!empty($datos)) {
            $this->id_rol = $datos['id_rol'];
            $this->nombre = $datos['nombre'];
            $this->descripcion = $datos['descripcion'];
            $this->estado = $datos['estado'];
        }
    }
}