<?php include_once(__DIR__ . "/../../../templates/header.php") ?><div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php
  $dni = rand(10000000, 99999999);
  ?>
  <div class="content is-medium">
    <p>Debug: $dni % 23 = <?= $dni % 23 ?></p>
    <p>Result: </p>
    <div class="box">
      <?= $dni . "-" . chr($dni % 23 + 65)  ?>
    </div>
  </div>
</div><?php include_once(__DIR__ . "/../../../templates/footer.php") ?>