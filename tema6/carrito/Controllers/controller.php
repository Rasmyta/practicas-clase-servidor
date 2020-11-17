<?php
    session_start();

    include_once("../Model/ProductoDB.php");
    include_once("../Model/LineaCarro.php");
    include_once("../Model/CarroCompra.php");
    include_once("../Views/VistaIndex.php");
    use Carrodelacompra\VistaIndex;
    use Carrodelacompra\CarroCompra;
    use Carrodelacompra\ProductoDB;
    use Carrodelacompra\LineaCarro;

    //Acción de añadir producto al carro
    if (isset($_POST['comprar'])) {
        //Llamamos a BD para obtener el objeto producto con ese id
        $producto = ProductoDB::getProductoId($_POST['item-id']);
        //Creamos una línea de carro con ese producto
        $lineaCarro = new LineaCarro($producto);
        //Deserializamos el carro de la sesión para añadirle esa línea de carro
        $carro = unserialize($_SESSION['carrito']);
        //Añadimos al carro esa línea de carro
        $carro->add($lineaCarro);
        //Volvemos a serializar el carro con la nueva línea añadida
        $_SESSION['carrito'] = serialize($carro);

        header("Location: ../index.php");
    }




?>