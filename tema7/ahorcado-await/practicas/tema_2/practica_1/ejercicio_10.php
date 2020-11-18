<?php include_once(__DIR__ . "/../../../templates/header.php") ?><div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <div class="content is-medium">
    <?php
    $numArr = array();
    $sumPar = 0;
    $countPar = 0;
    for ($i = 0; $i < 10; $i++) {
      $numArr[] = rand(0, 100);
    }

    ?>
    <p>Result: </p>
    <?php
    echo '<div class="box">';
    echo 'Impar numbers: ';
    foreach ($numArr as $num) {
      if ($num % 2 == 0) {
        $sumPar += $num;
        $countPar++;
      } else {
        echo $num . ", ";
      }
    }
    echo '<p>Media par: ' . $sumPar / $countPar . '</p>';
    echo '</div>';
    ?>
  </div>
</div><?php include_once(__DIR__ . "/../../../templates/footer.php") ?>