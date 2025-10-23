<?php

namespace App\Modelo;

class Categoria {
    
    public $id;
    public $nombre;
      public $categoria;
    public function __construct(array $datos = []) {
        if (!empty($datos)) {
            $this->id = $datos['id'] ?? null;
            $this->nombre = $datos['nombre'] ?? null;
            $this->categoria = $datos['categoria'] ?? null;
        }
    }
}



