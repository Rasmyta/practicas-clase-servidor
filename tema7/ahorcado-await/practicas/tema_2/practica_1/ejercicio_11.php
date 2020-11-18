<?php include_once(__DIR__ . "/../../../templates/header.php") ?><div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <div class="content is-medium">
    <?php
    define("LENGTH", 7);
    $arr = array();

    for ($i = 0; $i < LENGTH; $i++) {
      for ($j = 0; $j < LENGTH; $j++) {
        // if they are diagonal add 1 otherwise add a random number
        if ($i == $j || $i + $j == LENGTH - 1) {
          $arr[$i][$j] = 1;
        } else {
          $arr[$i][$j] = rand(2, 100);
        }
      }
    }

    // Vector sum of each row and each column of the array
    $sumFilas = array();
    $sumColumnas = array();

    foreach ($arr as $keyRow => $row) {
      $sumFila = 0;
      foreach ($row as $keyCol => $cell) {
        // sum filas
        $sumFila += $cell;

        // sum columnas
        if ($keyRow == 0) {
          $sumColumnas[$keyCol] = $cell;
        } else {
          $sumColumnas[$keyCol] += $cell;
        }
      }
      $sumFilas[$keyRow] = $sumFila;
    }

    // Add the sums to the array so it will print in the table
    for ($i = 0; $i < LENGTH; $i++) {
      $arr[$i][LENGTH + 1] = $sumFilas[$i];
      $arr[LENGTH + 1][$i] = $sumColumnas[$i];
    }

    ?>
    <p>Result: </p>
    <div class="box">
      <table class="table is-hoverable">
        <?php
        foreach ($arr as $keyRow => $row) {
          echo '<tr>';
          foreach ($row as $keyCol => $cell) {
            // if it is the sum of the row or column make it bold
            if ($keyCol == LENGTH + 1 || $keyRow == LENGTH + 1) {
              echo '<th>' . $cell . '</th>';
            } else {
              echo '<td>' . $cell . '</td>';
            }
          }
          echo '</tr>';
        }
        ?>
      </table>
    </div>
  </div>
</div><?php include_once(__DIR__ . "/../../../templates/footer.php") ?>