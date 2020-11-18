<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php
  $carrito = array(
    array("id" => 1234, "nombre" => "PS4", "precio" => 349.95, "cant" => 2, "iva_r" => 0),
    array("id" => 1235, "nombre" => "iPhone XS", "precio" => 1249.95, "cant" => 1, "iva_r" => 0),
    array("id" => 1236, "nombre" => "Chocolate", "precio" => 9.95, "cant" => 5, "iva_r" => 1),
    array("id" => 1237, "nombre" => "Cable USB 3.0 Tipo C ", "precio" => 6.00, "cant" => 2, "iva_r" => 1),
    array("id" => 1238, "nombre" => "Microondas con Grill ", "precio" => 55.00, "cant" => 1, "iva_r" => 0),
    array("id" => 1239, "nombre" => "Cable audio Jack", "precio" => 3.00, "cant" => 3, "iva_r" => 1),
    array("id" => 1240, "nombre" => "Raton Inalambrico", "precio" => 12.00, "cant" => 1, "iva_r" => 1),
    array("id" => 1241, "nombre" => "Montiron 144hz", "precio" => 200.00, "cant" => 2, "iva_r" => 0)
  );

  function subtotal($linea_pedido)
  {
    $iva = $linea_pedido["iva_r"] ? 1.10 : 1.21;
    $precio = $linea_pedido["precio"] * $linea_pedido["cant"];
    $precio_con_iva = $precio * $iva;

    return array(
      "id" => $linea_pedido["id"],
      "nombre" => $linea_pedido["nombre"],
      "cant" => $linea_pedido["cant"],
      "precio" => $precio,
      "precio_con_iva" => $precio_con_iva
    );
  }

  $carrito_con_iva = array();

  foreach ($carrito as $producto) {
    $carrito_con_iva[] = subtotal($producto);
  }

  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <p>Ordered by name: </p>
    <div class="box">
      <table class="table is-hoverable">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Precio Con IVA</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($carrito_con_iva as $producto) {
            echo '<tr>';
            foreach ($producto as $key => $value) {
              if ($key != "id") {
                echo '<td>';
                echo $value;
                if ($key == "precio" || $key == "precio_con_iva") {
                  echo " €";
                }
                echo '</td>';
              }
            }
            echo '</tr>';
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3"></td>
            <th>
              Total:
              <?php
              $sum = 0;
              foreach ($carrito_con_iva as $producto) {
                $sum += $producto["precio_con_iva"];
              }
              echo $sum . " €";
              ?>
            </th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>