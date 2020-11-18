<?php include_once(__DIR__ . "/../../../templates/header.php") ?><div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <div class="content is-medium">
    <?php
    $notas = array(
      array("nombre" => "Devin", "materia" => "DWS", "nota" => 3),
      array("nombre" => "Risa", "materia" => "DAW", "nota" => 5),
      array("nombre" => "Aline", "materia" => "EIE", "nota" => 3),
      array("nombre" => "Fletcher", "materia" => "DWS", "nota" => 5),
      array("nombre" => "Linda", "materia" => "DI", "nota" => 8),
      array("nombre" => "Finn", "materia" => "LC", "nota" => 6),
      array("nombre" => "Brian", "materia" => "DI", "nota" => 4),
      array("nombre" => "Madonna", "materia" => "LC", "nota" => 4),
      array("nombre" => "Yvonne", "materia" => "DAW", "nota" => 8),
    );

    function printNotas($notas)
    {
      foreach ($notas as $nota) {
        echo "<tr>";
        foreach ($nota as $val) {
          echo "<td>" . $val . "</td>";
        }
        echo "</tr>";
      }
    }
    ?>
    <p>Result: </p>
    <p>Ordered by name: </p>
    <div class="box">
      <table>
        <thead>
          <tr>
            <th>Nombe</th>
            <th>Materia</th>
            <th>Nota</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $nombres = array_column($notas, "nombre");
          array_multisort($nombres, SORT_DESC, $notas);
          printNotas($notas);
          ?>
        </tbody>
      </table>
    </div>
    <p>Ordered by nota: </p>
    <div class="box">
      <table>
        <thead>
          <tr>
            <th>Nombe</th>
            <th>Materia</th>
            <th>Nota</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $nombres = array_column($notas, "nota");
          array_multisort($nombres, SORT_DESC, $notas);
          printNotas($notas);
          ?>
        </tbody>
      </table>
    </div>
    <p>Nota media de curso: </p>
    <div class="box">
      <?php
      $sum = 0;
      foreach ($notas as $nota) {
        $sum += $nota["nota"];
      }
      echo round($sum / count($notas), 2);
      ?>
    </div>
    <p>Alumnos suspensos: </p>
    <div class="box">
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Materia</th>
            <th>Nota</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($notas as $nota) {
            if ($nota["nota"] < 5) {
              echo "<tr>";
              foreach ($nota as $val) {
                echo "<td>" . $val . "</td>";
              }
              echo "</tr>";
            }
          }
          ?>
        </tbody>
      </table>

    </div>
  </div>
</div><?php include_once(__DIR__ . "/../../../templates/footer.php") ?>