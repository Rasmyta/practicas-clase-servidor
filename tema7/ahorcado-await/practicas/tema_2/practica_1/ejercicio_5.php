<?php include_once(__DIR__ . "/../../../templates/header.php") ?><div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php
  $numero = rand(0, 99);

  $specialCases = [10 => "diez", 11 => "once", 12 => "doce", 13 => "trece", 14 => "catorce", 15 => "quince", 20 => "veinte"];
  $numArr = [0 => "zero", 1 => "uno", 2 => "dos", 3 => "tres", 4 => "cuatro", 5 => "cinco", 6 => "seis", 7 => "siete", 8 => "ocho", 9 => "nueve"];
  $tensArr = [10 => "dieci", 20 => "veinti", 30 => "treinta", 40 => "cuarenta", 50 => "cincuenta", 60 => "sesenta", 70 => "setenta", 80 => "ochenta", 90 => "noventa"];
  ?>
  <div class="content is-medium">
    <p>Debug: $numero = <?= $numero ?></p>
    <p>Result: </p>
    <?php
    echo '<div class="box">';
    if ($numero < 10) {
      echo $numArr[$numero];
    } elseif (array_key_exists($numero, $specialCases)) {
      echo $specialCases[$numero];
    } else {
      $tensPlace = intdiv($numero, 10) * 10;
      $onesPlace = $numero % 10;
      if ($onesPlace == 0) {
        echo $tensArr[$tensPlace];
      } elseif ($numero > 9 && $numero < 30) {
        // Words that dont include specialCases are formated as Diecinueve not dieci y nueve. Only after 30's we say trenta y nueve and so on.
        echo $tensArr[$tensPlace] . $numArr[$onesPlace];
      } else {
        // Words that are over 30
        echo $tensArr[$tensPlace] . " y " . $numArr[$onesPlace];
      }
    }
    echo '</div">';
    ?>
  </div>
</div><?php include_once(__DIR__ . "/../../../templates/footer.php") ?>