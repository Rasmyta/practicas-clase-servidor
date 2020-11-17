<?php
namespace Carrodelacompra;

use Carrodelacompra\Producto;


/*
 * Clase LineaCarro
 * Cada una de las líneas del carrito de la compra. 
 * producto, cantidad
 */

 class LineaCarro {

    private $producto;
    private $cantidad;

    public function __construct($unProducto, $unaCantidad=1) {
        $this->producto = $unProducto;
        $this->cantidad = $unaCantidad;
    }

    public function getProducto() {
        return $this->producto;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setProducto($unProducto) {
        $this->producto = $unProducto;
    }
    
    public function setCantidad($unaCantidad) {
        $this->cantidad = $unaCantidad;
    }

    public function incrementarCantidad(){
        $this->cantidad++;
    }

    public function decrementarCantidad(){
        if ($this->cantidad > 1)
            $this->cantidad--;
    }

    public function getSubTotal() {
        return $this->getProducto()->getPrecio() * $this->getCantidad();
    }

    public function getSubTotalIVA() {
        return $this->getProducto()->getPrecio() * $this->getProducto()->getIva() * $this->getCantidad();
    }


 }




?>