<?php
    //Leemos los libros que vienen por Ajax
    $libros = $_POST['data'];
    //Lo recorremos y lo vamos metiendo en BBDD
    foreach ($libros as $libro) {
        //Se accede así:
        //$libro['titulo']
        //Vamos leyendo cada línea de pedido y grabándola en BBDD


    }

    echo "Pedido procesado correctamente";
?>