<?php

class Categorias{
    private $id_categoria;
    private $nombre;
    private $descripcion;
    private $estado;

    public function __construct(array $datos = [])
    {
        if (!empty($datos)) {
            $this->id_categoria = $datos['id_categoria'];
            $this->nombre = $datos['nombre'];
            $this->descripcion = $datos['descripcion'];
            $this->estado = $datos['estado'];
        }
    }
    
    
}