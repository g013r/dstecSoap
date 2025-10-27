<?php 

class Detalle_ventas{
    private $id_detalle;
    private $id_venta;
    private $id_producto;
    private $cantidad;
    private $precio_unitario;
    private $subtotal;
    private $estado;
    private $metodo_pago;
    public function __construct(array $datos = [])
    {
        if (!empty($datos)) {
            $this->id_detalle = $datos['id_detalle'];
            $this->id_venta = $datos['id_venta'];
            $this->id_producto = $datos['id_producto'];
            $this->cantidad = $datos['cantidad'];
            $this->precio_unitario = $datos['precio_unitario'];
            $this->subtotal = $datos['subtotal'];
            $this->estado = $datos['estado'];
            $this->metodo_pago = $datos['metodo_pago'];
        }
    }
}