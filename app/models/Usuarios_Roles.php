<?php

namespace app\models;

class Usuarios_Roles
{
    private $id_usuario;
    private $id_rol;

    //No se porque toma como que no lo estoy usando xd
    private $usuario;
    private $rol;
    public function __construct(array $datos = [])
    {
        if (!empty($datos)) {
            $this->id_usuario = $datos['id_usuario'] ?? null;
            $this->id_rol = $datos['id_rol'] ?? null;

            //Instancias 
            if (isset($datos['usuario_data'])) {
                $this->usuario = new Usuarios($datos['usuario_data']);
            }

            if (isset($datos['rol_data'])) {
                $this->rol = new Roles($datos['rol_data']);
            }
        }
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
    public function getIdRol()
    {
        return $this->id_rol;
    }

    public function setIdRol($id_rol)
    {
        $this->id_rol = $id_rol;
    }

    //Sincronizacion de datos
    public function setUsuario(Usuarios $usuario)
    {
        $this->usuario = $usuario;
        $this->id_usuario = $usuario->getIdUsuario();
    }

    public function setRol(Roles $rol)
    {
        $this->rol = $rol;
        $this->id_rol = $rol->getIdRol();
    }
}
