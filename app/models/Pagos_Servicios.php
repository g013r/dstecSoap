<?php

namespace app\models;

class Pagos_Servicios
{
    public $id_pago;
    public $id_cita;
    public $id_usuario;
    public $monto;
    public $metodo;
    public $fecha_pago;

    public function __construct(array $datos = [])
    {
        if (!empty($datos)) {
            $this->id_pago = $datos['id_pago'] ?? null;
            $this->id_cita = $datos['id_cita'] ?? null;
            $this->id_usuario = $datos['id_usuario'] ?? null;
            $this->monto = $datos['monto'] ?? null;
            $this->metodo = $datos['metodo'] ?? null;
            $this->fecha_pago = $datos['fecha_pago'] ?? null;
        }
    }
}
