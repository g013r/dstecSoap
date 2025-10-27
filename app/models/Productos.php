<?php

class Productos{
    private $id_producto;
    private $id_categoria;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $precio;
    private $stock;
    private $estado;



    public function __construct(array $datos = [])
    {
        if (!empty($datos)) {
            $this->id_producto = $datos['id_producto'];
            $this->id_categoria = $datos['id_categoria'];
            $this->nombre = $datos['nombre'];
            $this->descripcion = $datos['descripcion'];
            $this->imagen = $datos['imagen'];
            $this->precio = $datos['precio'];
            $this->stock = $datos['stock'];
            $this->estado = $datos['estado'];
        }
    }
}