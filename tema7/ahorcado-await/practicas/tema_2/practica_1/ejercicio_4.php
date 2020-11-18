<?php include_once(__DIR__ . "/../../../templates/header.php") ?><div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php
  // a:0, b:6, c:5 => expected if a <= 0  
  // a:1, b:6, c:5 => expected if D > 0 
  // a:1, b:-6, c:9 => expected else if D == 0 
  // a:1, b:-3, c:10 => expected else D < 0 
  $a = 1;
  $b = 4;
  $c = 5;
  $D = $b * $b - 4 * $a * $c;

  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <?php
    echo '<div class="box">';
    if ($a <= 0) {
      echo "<p>Variable <strong>a</strong> cannot be 0</p>";
    } else {
      if ($D > 0) {
        $x1 = (-$b + sqrt($D)) / (2 * $a);
        $x2 = (-$b - sqrt($D)) / (2 * $a);
        echo "<p>Roots of the equation are ${x1} and ${x2} </p>";
        echo "<p>Where a, b, c are $a, $b and $c.</p>";
      } elseif ($D == 0) {
        $x1 = $x2 = -$b / (2 * $a);
        echo "The roots of the quadratric equation are  ${x1} and ${x2}";
        echo "<p>Where a, b, c are $a, $b and $c.</p>";
      } else {
        $realPart = -$b / (2 * $a);
        $imagPart = sqrt(-$D) / (2 * $a);
        echo "<p>The roots of quadratic equation are ${realPart} + ${imagPart}i and ${realPart} - ${imagPart}i</p>";
        echo "<p>Where a, b, c are $a, $b and $c.</p>";
      }
    }
    echo '</div>';
    ?>
  </div>
</div><?php include_once(__DIR__ . "/../../../templates/footer.php") ?>