<?php

class Usuarios_Roles{
    private $id_usuario_rol;
    private $id_usuario;
    private $id_rol;
    private $fecha_asignacion;
    private $estado;

    public function __construct(array $datos = [])
    {
        if (!empty($datos)) {
            $this->id_usuario_rol = $datos['id_usuario_rol'];
            $this->id_usuario = $datos['id_usuario'];
            $this->id_rol = $datos['id_rol'];
            $this->fecha_asignacion = $datos['fecha_asignacion'];
            $this->estado = $datos['estado'];
        }
    }
}