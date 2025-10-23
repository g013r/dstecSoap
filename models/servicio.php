<?php

namespace App\Modelo;

class servicio {
    
    public $id_servicio;
    public $nombre;
    public $descripcion;
    public $precio;
    public $estado;
    
    public function __construct(array $datos = []) {
        if (!empty($datos)) {
            $this->id_servicio = $datos['id_servicio'] ?? null;
            $this->nombre = $datos['nombre'] ?? null;
            $this->descripcion = $datos['descripcion']?? null;
            $this->precio = $datos['precio']?? null;
            $this->estado = $datos['estado']?? null;
        }
    }
}