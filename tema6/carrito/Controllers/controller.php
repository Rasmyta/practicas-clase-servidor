<?php
    session_start();

    include_once("../Model/ProductoDB.php");
    include_once("../Model/LineaCarro.php");
    include_once("../Model/CarroCompra.php");
    use Carrodelacompra\CarroCompra;
    use Carrodelacompra\ProductoDB;
    use Carrodelacompra\LineaCarro;

    //Acción de añadir producto al carro
    if (isset($_POST['comprar'])) {
        $producto = ProductoDB::getProductoId($_POST['item-id']);

        $lineaCarro = new LineaCarro($producto,1);
        
        $carro = unserialize($_SESSION['carrito']);

        $carro->add($lineaCarro);
        $_SESSION['carrito'] = serialize($carro);

        $lineas = $carro->getLineasCarro();
        foreach($lineas as $linea) {
            echo $linea->getProducto()->getNombre();
        }
        
    }




?>