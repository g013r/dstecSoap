<?php

namespace app\models;

class Devoluciones {
    
    public $id_devolucion;
    public $id_venta;
    public $id_usario;
    public $fecha;
    public $motivo;
    
    public function __construct(array $datos = []) {
        if (!empty($datos)) {
            $this->id_devolucion = $datos['id_devolucion'] ?? null;
            $this->id_venta = $datos['id_venta'] ?? null;
            $this->id_usario = $datos['id_usario']?? null;
            $this->fecha = $datos['fecha']?? null;
            $this->motivo = $datos['motivo']?? null;
        }
    }
}

