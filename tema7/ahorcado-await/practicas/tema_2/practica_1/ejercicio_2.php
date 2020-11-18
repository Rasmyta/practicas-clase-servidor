<?php include_once(__DIR__ . "/../../../templates/header.php") ?><div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php
  $cadena1 = "Hola a todo el mundo ";
  $cadena2 = " mi nobre es Stefan Eduard";
  $cadena3 = $cadena1 . $cadena2;
  $cadena1 .= $cadena2;
  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <div class="box">
      <p>Cadena1: <?= $cadena1 ?></p>
      <p>Cadena3: <?= $cadena3 ?></p>
    </div>
  </div>
</div><?php include_once(__DIR__ . "/../../../templates/footer.php") ?>