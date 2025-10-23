<?php

namespace app\models;

class Usuarios
{
    private $id_usuario;
    private $nombre;
    private $email;
    private $password;
    private $telefono;
    private $direccion;
    private $estado;

    public function __construct(array $datos = [])
    {
        if (!empty($datos)) {
            $this->id_usuario = $datos['id_usuario'];
            $this->nombre = $datos['nombre'] ?? null;
            $this->email = $datos['email'] ?? null;
            $this->password = $datos['password'] ?? null;
            $this->telefono = $datos['telefono'] ?? null;
            $this->direccion = $datos['direccion'] ?? null;
            $this->estado = $datos['estado'] ?? null;
        }
    }

    //Getters y Setters
    public function getIdUsuario(): int
    {
        return $this->id_usuario;
    }
    public function setIdUsuario(int $id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }
}
