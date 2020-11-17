<?php
session_start();

include_once("Model/ProductoDB.php");
include_once("Model/CarroCompra.php");
include_once("Views/VistaIndex.php");
use Carrodelacompra\CarroCompra;
use Carrodelacompra\ProductoDB;
use Carrodelacompra\VistaIndex;


if (!isset($_SESSION['carrito'])) {
    $carro = new CarroCompra();
    $_SESSION['carrito'] = serialize($carro);
} else {
    $carro = unserialize($_SESSION['carrito']);
}

//Recuperar los productos de la BD como objetos
$productos = ProductoDB::getProductos();
VistaIndex::render($productos,$carro->count());

?>
