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
    <a href="https://juegociam.herokuapp.com/" target="_blank">Go to website hosted on Heroku</a>
    <hr>
    <a href="https://github.com/bilalbejja-collab/juegaciam2020" target="_blank">See the source code on GitHub</a>
  </div>
</div>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>