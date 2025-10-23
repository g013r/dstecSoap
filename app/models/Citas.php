<?php
namespace app\models;

class Citas {
    public $id_cita;
    public $id_servicio;
    public $id_usuario;
    public $id_cliente;
    public $fecha;
    public $estado;

    public function __construct(array $datos = []) {
        if (!empty($datos)) {
            $this->id_cita = $datos['id_cita'] ?? null;
            $this->id_servicio = $datos['id_servicio'] ?? null;
            $this->id_usuario = $datos['id_usuario'] ?? null;
            $this->id_cliente = $datos['id_cliente'] ?? null;
            $this->fecha = $datos['fecha'] ?? null;
            $this->estado = $datos['estado'] ?? null;
        }
    }
}
