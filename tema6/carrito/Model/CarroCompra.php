<?php
namespace Carrodelacompra;

use Carrodelacompra\LineaCarro;


/*
 * Clase CarroCompra
 * Todas las líneas de pedido del carro de la compra
 * lineasPedido
 */

class CarroCompra {

    private $lineasCarro;


    public function __construct() {
        $this->lineasCarro = array();
    }

    public function getLineasCarro() {
        return $this->lineasCarro;
    }

    public function setLineasCarro($lineasCarro) {
        $this->lineasCarro = $lineasCarro;
    }

    //Añadir una línea al carro de la compra
    public function add($unaLineaCarro) {
        //Comprobamos si el id ya está en el carro
        $idProducto = $unaLineaCarro->getProducto()->getId();
        $encontrado = false;
        foreach($this->lineasCarro as $linea) {
            if ($linea->getProducto()->getId() == $idProducto) {
                $encontrado = true;
                $linea->incrementarCantidad();
            }
        }
        //Si no está añado una nueva línea
        if (!$encontrado)
            array_push($this->lineasCarro,$unaLineaCarro);
    }

    //Contar número de líneas de carro de la compra
    public function count() {
        return count($this->lineasCarro);
    }

    //Calculo del precio total del carro
    public function getTotal() {
        $total=0;
        foreach($this->getLineasCarro() as $linea) {
            $total += $linea->getSubtotal();
        }

        return $total;
    }

    //Eliminar línea del carro
    public function eliminarLinea($id) {
        foreach($this->lineasCarro as $key => $linea) {
            if ($linea->getProducto()->getId() == $id) {
                unset($this->lineasCarro[$key]);
            }
        }

    }

    //Prueba de método __toString() se ejecuta cuando se intenta tratar un objeto como cadena
    public function __toString() {
        $cadena="";
        foreach($this->getLineasCarro() as $linea) {
            $cadena .= $linea->getProducto()->getNombre() . " ";
        }

        return $cadena;
    }


}


 

?>