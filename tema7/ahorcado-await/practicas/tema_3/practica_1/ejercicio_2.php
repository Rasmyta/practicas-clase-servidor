<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php
  include_once('ejercicio_2/asignaturas.php');
  include_once('ejercicio_2/displayVote.php');

  function vote($asignatura, $isIncrement)
  {
    $vote = $_SESSION['asignaturas'][$asignatura];
    if ($isIncrement && $vote != 100) {
      $_SESSION['asignaturas'][$asignatura] += 10;
    } elseif (!$isIncrement && $vote != 0) {
      $_SESSION['asignaturas'][$asignatura] -= 10;
    }
  }
  ?>
  <div class="content is-medium">
    <div class="box">
      <form action="" method="POST">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['vote'])) {
          // Exptected vote => increment-DWS or decrement-DWC
          $values = explode('-', $_POST['vote']);
          $isIncrement = $values[0] == 'increment';
          $asignatura = $values[1];

          vote($asignatura, $isIncrement);
        }
        foreach ($_SESSION['asignaturas'] as $asignatura => $vote) {
          displayVote($asignatura, $vote);
        }
        ?>
      </form>
    </div>
  </div>
</div>
<!-- <script src="ejercicio_2/script.js"></script> -->
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>