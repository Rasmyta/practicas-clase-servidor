<?php include_once(__DIR__ . "/../../../templates/header.php") ?><div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php
  $radio = rand(0, 30);
  $area = pi() * pow($radio, 2);
  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <div class="box">
      <p>Area of circle with radius <?= $radio ?> is: <?= $area ?></p>
    </div>
  </div>
</div><?php include_once(__DIR__ . "/../../../templates/footer.php") ?>