<?php

namespace app\models;

class Roles{
    private $id_rol;
    private $nombre;
    private $descripcion;

    public function __construct(array $datos = []){
        if(!empty($datos)){
            $this->id_rol = $datos['id_rol'] ?? null;
            $this->nombre = $datos['nombre'] ?? null;
            $this->descripcion = $datos['descripcion'] ?? null;
        }
    }

    //Getters y Setters
    public function getIdRol(){
        return $this->id_rol;
    }

    public function setIdRol($id_rol){
        $this->id_rol = $id_rol;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
}