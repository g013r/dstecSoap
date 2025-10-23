<?php
namespace app\models;

class Reembolsos {
    public $id_reembolso;
    public $id_devolucion;
    public $id_usuario;
    public $monto;
    public $fecha;

    public function __construct(array $datos = []) {
        if (!empty($datos)) {
            $this->id_reembolso = $datos['id_reembolso'] ?? null;
            $this->id_devolucion = $datos['id_devolucion'] ?? null;
            $this->id_usuario = $datos['id_usuario'] ?? null;
            $this->monto = $datos['monto'] ?? null;
            $this->fecha = $datos['fecha'] ?? null;
        }
    }
}