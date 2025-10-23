<?php

namespace App\Modelo;

use App\Modelo\Categoria; 

class Producto {
    
    public $id;
    public $categoria_id; 
    public $proveedor_id; 
    public $nombre;
    public $descripcion; 
    public $precio;
    public $stock;
    public $imagen;
    public $estado; 
    public $fecha_registro;
    public $categoria; 
    public function __construct(array $datos = []) {
        if (!empty($datos)) {
            $this->id= $datos['id']?? null;
            $this->categoria_id= $datos['categoria_id'] ?? null;
            $this->proveedor_id= $datos['proveedor_id']?? null;
            $this->nombre= $datos['nombre'] ?? null;
            $this->descripcion= $datos['descripcion']?? null;
            $this->precio= $datos['precio']?? 0.00;
            $this->stock= $datos['stock']?? 0;
            $this->imagen= $datos['imagen']?? null;
            $this->estado= $datos['estado']?? 'Activo';
            $this->fecha_registro= $datos['fecha_registro']   ?? date('Y-m-d H:i:s');
            $this->categoria = null; 
        }
    }

    public function setCategoria(Categoria $categoria): void {
        $this->categoria = $categoria;
    }
    public function getCategoria(): ?Categoria {
        return $this->categoria;
    }
}
