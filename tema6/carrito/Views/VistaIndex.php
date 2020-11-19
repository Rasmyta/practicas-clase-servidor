<?php
namespace Carrodelacompra;

class VistaIndex {

    public static function render($productos,$count) {

        
        include_once("_cabecera.php");
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
                        echo "<a href='login.php' class='p-3'><i class='far fa-user'></i> MI CUENTA</a>
                              <a href='./Controllers/controller.php?accion=verCarro' class='p-3'><i class='fas fa-shopping-bag'></i> 
                                <span class='bg-info text-white px-2 py-1 rounded-circle' style='font-size: 13px;'>".$count."</span>
                                MI CESTA</a>";
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
                    <?php 
                    foreach ($productos as $item) {
                        echo "<div class='col mb-5'>
                                <div class='card border-0' style='width: 18rem; height: 90%;'>
                                    <img class='card-img-top' src='data:image/png;base64," . base64_encode($item->getImagen()) . "' alt='" . $item->getDescripcion() . "'>
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
                    ?>
                </div>
            </section>
        </div>

<?php
        
        
    }

}

?>