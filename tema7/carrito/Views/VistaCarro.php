<?php
namespace Carrodelacompra;

class VistaCarro {

    public static function render($carro) {


        echo "<div class='text-center m-5'>
            <h4>MI CESTA</h4>
            </div>";
        echo "<table class='table table-bordered col-9 mx-auto'>
            <thead class='thead-dark text-center'>
                <tr>
                    <th>PRODUCTO</th>
                    <th width='50%'>DETALLES DEL PRODUCTO</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                    <th>TOTAL</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class='text-center'>";
        foreach ($carro->getLineasCarro() as $linea) {
            $producto = $linea->getProducto();
            echo "<tr>
                    <td><img style='width: 100px;' src='data:image/png;base64," . base64_encode($producto->getImagen()) . "'></td>
                    <td class='text-left'>" . $producto->getDescripcion() . "</td>
                    <td>" . $producto->getPrecio(). " &euro;</td>
                    <td><a href='#' onclick='cambiarCantidad(" . $producto->getId() . ",1)'><i class='fas fa-plus-square px-2'></i></a>" . $linea->getCantidad();
            if ($linea->getCantidad() > 1) {
                echo "  <a href='#' onclick='cambiarCantidad(" . $producto->getId() . ",2)'><i class='fas fa-minus-square px-2'></i></a></td>";
            }
            echo "  <td>" . $linea->getSubTotal() . " &euro;</td>
                    <td><a href='#' onclick='deleteLinea(" . $producto->getId() . ")'><i class='fas fa-times'></i></a></td>
                </tr>";
        }
        echo "<tr class='text-right'>
                    <td colspan='4'><strong>Total a pagar </strong></td>
                    <td><strong>" . $carro->getTotal() . " &euro;</strong></td>
                    <td></td>
                </tr>";
        echo "</tbody>
            </table>";
        //si session esta vacia

        //botton para volver a index.php
        echo "<div class='text-center m-5'>
                <a href='#' onclick='inicio()' class='btn btn-info m-3'><- Seguir comprando</a>
            </div>";
    }
}

?>