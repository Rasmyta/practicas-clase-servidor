<?php
session_start();
//session_destroy();

if (!isset($_SESSION['user-agent']))
    $_SESSION['user-agent'] = $_SERVER['HTTP_USER_AGENT'];
else {
    if ($_SESSION['user-agent'] != $_SERVER['HTTP_USER_AGENT'])
        session_destroy();
}

include_once("_cabecera.php");
include_once("Model/ProductoDB.php");
include_once("Model/CarroCompra.php");
use Carrodelacompra\CarroCompra;
use Carrodelacompra\ProductoDB;

function pintar_productos($productos)
{
    
    foreach ($productos as $item) {
        echo "<div class='col mb-5'>
                <div class='card border-0' style='width: 18rem; height: 90%;'>
                    <img class='card-img-top' src='" . $item->getImagen() . "' alt='" . $item->getDescripcion() . "'>
                    <div class='card-body' style='height: 100%;'>
                        <a href='#'><h5 class='card-title'>" .  $item->getDescripcion() . "</h5></a>
                    </div>
                    <p><b>" .  $item->getPrecio() . " &euro;</b></p>
                </div>
                <form action='Controllers/controller.php' method='POST' style='width: 18rem; height: 90%;'>
                    <input type='hidden' name='item-id' value='" .  $item->getId() . "'>
                    <button type='submit' name='comprar' class='btn btn-info'>COMPRAR</button>
                </form>
            </div>";
    }
    
}

function total_items($session)
{
    return  0;
}

if (!isset($_SESSION['carrito'])) {
    $carro = new CarroCompra();
    $_SESSION['carrito'] = serialize($carro);
}

//Recuperar los productos de la BD como objetos
$productos = ProductoDB::getProductos();

?>

<!--Contenido principal-->
<div class="container-fluid p-3 text-dark">
    <header class="row text-center align-items-center my-3 border-top border-bottom">
        <div class="col"></div>
        <a href="index.php" class="title">
            <h1 class="col-md-auto">Rasma Cosmetics</h1>
        </a>
        <div class='col'>
            <?php
            if (isset($_SESSION['usuario'])) {
                echo "<a href='' class='p-3'><i class='far fa-user'></i> Hola </a>
                      <a href='logout.php?logout=true' class='p-3'><i class='fas fa-sign-out-alt'></i> LOG OUT</a>
                      <a href='carro.php' class='p-3'><i class='fas fa-shopping-bag'></i>
                        <span class='bg-info text-white px-2 py-1 rounded-circle' style='font-size: 13px;'>" . total_items($_SESSION['carrito']) . "</span>
                        MI CESTA</a>";
            } else {
                echo "<a href='login.php' class='p-3'><i class='far fa-user'></i> MI CUENTA</a>
                      <a href='carro.php' class='p-3'><i class='fas fa-shopping-bag'></i> 
                        <span class='bg-info text-white px-2 py-1 rounded-circle' style='font-size: 13px;'>" . total_items($_SESSION['carrito']) . "</span>
                        MI CESTA</a>";
            }
            ?>
        </div>
    </header>
    <nav class="col-9 mx-auto">
        <ul class="list-unstyled d-flex flex-wrap justify-content-around">
            <a href="">
                <li>OFERTAS</li>
            </a>
            <a href="">
                <li>REGALOS</li>
            </a>
            <a href="">
                <li>NOVEDADES</li>
            </a>
            <a href="">
                <li>BEST SELLERS</li>
            </a>
            <a href="">
                <li>ROSTRO</li>
            </a>
            <a href="">
                <li>MAKE-UP</li>
            </a>
            <a href="">
                <li>CUERPO</li>
            </a>
            <a href="">
                <li>CABELLO</li>
            </a>
            <a href="">
                <li>MANOS</li>
            </a>
            <a href="">
                <li>PERFUME</li>
            </a>
        </ul>
    </nav>
    <section class="text-center col-11 mx-auto my-5">
        <div class="row">
            <?php pintar_productos($productos) ?>
        </div>
    </section>
</div>

</body>
</html>