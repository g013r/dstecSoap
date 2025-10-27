<?php

class Usuarios{
    private $id_usuario;
    private $nombre;
    private $email;
    private $password;
    private $telefono;
    private $estado;
    
    public function __construct(array $datos = [])
    {
        if (!empty($datos)) {
            $this->id_usuario = $datos['id_usuario'];
            $this->nombre = $datos['nombre'];
            $this->email = $datos['email'];
            $this->password = $datos['password'];
            $this->telefono = $datos['telefono'];
            $this->estado = $datos['estado'];
        }
    }
}