<?php
    session_start();
    //session_destroy();

    include_once("..\autoload.php");
    use Carrodelacompra\VistaIndex;
    use Carrodelacompra\VistaCarro;
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

    
    if (isset($_GET['accion'])) {
        //Ver el carro de la compra
        if ($_GET['accion'] == 'verCarro') {
            VistaCarro::render(unserialize($_SESSION['carrito']));
        }

        //Sumar cantidad de un producto en el carro
        if ($_GET['accion'] == 'mas') {
            $id = $_GET['id'];
            //Deserializamos el carro de la sesión para añadirle esa línea de carro
            $carro = unserialize($_SESSION['carrito']);
            foreach($carro->getLineasCarro() as $linea) {
                if ($linea->getProducto()->getId() == $id ) 
                    $linea->incrementarCantidad();
            }

            VistaCarro::render($carro);
            //Volvemos a serializar el carro con la nueva línea añadida
            $_SESSION['carrito'] = serialize($carro);
        }

        //Restar cantidad de un producto en el carro
        if ($_GET['accion'] == 'menos') {
            $id = $_GET['id'];
            //Deserializamos el carro de la sesión para añadirle esa línea de carro
            $carro = unserialize($_SESSION['carrito']);
            foreach($carro->getLineasCarro() as $linea) {
                if ($linea->getProducto()->getId() == $id ) 
                    $linea->decrementarCantidad();
            }

            VistaCarro::render($carro);
            //Volvemos a serializar el carro con la nueva línea añadida
            $_SESSION['carrito'] = serialize($carro);
        }

        //Eliminar línea del carro
        if ($_GET['accion'] == 'delete') {
            $id = $_GET['id'];
            //Deserializamos el carro de la sesión para añadirle esa línea de carro
            $carro = unserialize($_SESSION['carrito']);
            $carro->eliminarLinea($id);
            

            VistaCarro::render($carro);
            //Volvemos a serializar el carro con la nueva línea añadida
            $_SESSION['carrito'] = serialize($carro);
        }       

    }

    if (isset($_POST['addProduct'])) {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $iva = $_POST['iva'];
        $imagenBlob = "";

        //Recibimos la imagen y la guardamos
        if (isset($_FILES['imagen'])) {
            //Faltarían comprobaciones de la imagen
            
            $imagen = $_FILES['imagen']['tmp_name'];
            $imagenBlob = file_get_contents($imagen);
        }

        ProductoDB::insertarProducto($nombre,$descripcion,$precio,$imagenBlob,$iva);
        header("Location: ../index.php");
    }

    




?>