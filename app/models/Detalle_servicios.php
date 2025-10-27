<?php

class Detalle_servicios{

    private $id_detalle_servicio;
    private $id_servicio;
    private $id_producto;
    private $nombre_trabajador;
    private $fecha;
    private $observaciones;
    private $estado;

    public function __construct(array $datos = [])
    {
        if (!empty($datos)) {
            $this->id_detalle_servicio = $datos['id_detalle_servicio'];
            $this->id_servicio = $datos['id_servicio'];
            $this->id_producto = $datos['id_producto'];
            $this->nombre_trabajador = $datos['nombre_trabajador'];
            $this->fecha = $datos['fecha'];
            $this->observaciones = $datos['observaciones'];
            $this->estado = $datos['estado'];
        }
    }
}