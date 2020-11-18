<?php include_once(__DIR__ . "/../../../templates/header.php") ?><div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <div class="content is-medium">
    <?php
    $queue = array();

    function addToQueue(&$queue, $n)
    {
      for ($i = 0; $i < $n; $i++) {
        array_unshift($queue, rand(1, 50));
      }
    }

    function removeFromQueue(&$queue, $n)
    {
      for ($i = 0; $i < $n; $i++) {
        array_pop($queue);
      }
    }

    function emptyQueue(&$queue)
    {
      $queue = array();
    }

    function printQueue($queue)
    {
      echo '<div class="box"';
      foreach ($queue as $val) {
        echo '<p>' . $val . '</p>';
      }
      echo '</div>';
    }
    ?>
    <p>Result: </p>
    <?php
    echo 'The queue';
    addToQueue($queue, 3);
    printQueue($queue);
    echo "Add 3 to queue";
    addToQueue($queue, 3);
    printQueue($queue);
    echo 'Remove 2 from queue';
    removeFromQueue($queue, 2);
    printQueue($queue);
    echo 'Empty queue';
    emptyQueue($queue);
    printQueue($queue);
    ?>
  </div>
</div><?php include_once(__DIR__ . "/../../../templates/footer.php") ?>