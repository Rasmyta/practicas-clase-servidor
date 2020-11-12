<?php
namespace Carrodelacompra;

include_once("LineaCarro.php");
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
        $this->lineasCarro = $lineaCarro;
    }

    //Añadir una línea al carro de la compra
    public function add($unaLineaCarro) {
        array_push($this->lineasCarro,$unaLineaCarro);
    }


}


 

?>