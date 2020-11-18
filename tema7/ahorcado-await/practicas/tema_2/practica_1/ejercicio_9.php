<?php include_once(__DIR__ . "/../../../templates/header.php") ?><div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <div class="content is-medium">
    <p>Result: </p>
    <?php
    echo '<div class="box">';
    for ($i = 0; $i < 5; $i++) {
      $red = rand(0, 255);
      $green = rand(0, 255);
      $blue = rand(0, 255);
      $circleSVG = '<svg height="100" width="100"><circle cx="50" cy="50" r="40" stroke="black" stroke-width="3" fill="rgb(' . $red . ',' . $green . ', ' . $blue . ')" /></svg>';

      echo $circleSVG;
    }
    echo '</div>';
    ?>
  </div>
</div><?php include_once(__DIR__ . "/../../../templates/footer.php") ?>