<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php

  ?>
  <div class="box">
    <p class="is-italic">Because this requires a new web page. The exercise will be made on another page completly independent of this.</p>
    <a href="ejercicio_6/index.php" class="mt-4 button is-primary">Go to webpage.</a>
  </div>
</div>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>