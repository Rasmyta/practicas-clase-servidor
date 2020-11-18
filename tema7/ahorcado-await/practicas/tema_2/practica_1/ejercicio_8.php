<?php include_once(__DIR__ . "/../../../templates/header.php") ?><div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <div class="content is-medium">
    <?php
    $lotteryNums = array();

    while (count($lotteryNums) != 7) {
      $randNum = rand(1, 99);
      if (!in_array($randNum, $lotteryNums)) {
        $lotteryNums[] = $randNum;
      }
    }

    ?>
    <p>Result: </p>
    <div class="box">
      <table class="table is-bordered" style="max-width: 600px;">
        <tr>
          <?php
          foreach ($lotteryNums as $num) {
            echo "<td>${num}</td>";
          }
          ?>
        </tr>
      </table>
    </div>
  </div><?php include_once(__DIR__ . "/../../../templates/footer.php") ?>