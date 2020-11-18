<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php
  $basketballTeams = array(
    "lakers" =>
    array(
      "id" => "lakers",
      "name" => "Los Angeles Lakers",
      "imgUrl" => "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Los_Angeles_Lakers_logo.svg/1200px-Los_Angeles_Lakers_logo.svg.png",
    ),
    "goldenStateWarriors" =>
    array(
      "id" => "goldenStateWarriors",
      "name" => "Golden State Warriors",
      "imgUrl" => "https://upload.wikimedia.org/wikipedia/en/thumb/0/01/Golden_State_Warriors_logo.svg/1200px-Golden_State_Warriors_logo.svg.png",
    ),
    "bostonCeltics" =>
    array(
      "id" => "bostonCeltics",
      "name" => "Boston Celitcs",
      "imgUrl" => "https://a.espncdn.com/i/teamlogos/nba/500/bos.png",
    ),
    "houstonRockets" =>
    array(
      "id" => "houstonRockets",
      "name" => "Houston Rockets",
      "imgUrl" => "https://upload.wikimedia.org/wikipedia/commons/6/6c/Houston-Rockets-logo.png",
    ),
    "miamiHeat" =>
    array(
      "id" => "miamiHeat",
      "name" => "Miami Heat",
      "imgUrl" => "https://upload.wikimedia.org/wikipedia/en/thumb/f/fb/Miami_Heat_logo.svg/1200px-Miami_Heat_logo.svg.png",
    )
  );


  ?>
  <div class="content is-medium">
    <div class="box">
      <div class="tile is-ancestor">
        <div class="tile is-parent is-vertical is-4">
          <?php
          // SESSION for storing the selected value to be preserved on refresh
          if (!isset($_SESSION['selectedTeam'])) {
            $_SESSION['selectedTeam'] = -1;
          }

          // Show the image of the team
          if (isset($_GET['basketballTeams']) && in_array($_GET['basketballTeams'], array_keys($basketballTeams))) {
            $_SESSION['selectedTeam'] = $_GET['basketballTeams'];

            echo '<div class="tile is-child">';
            echo '    <figure class="image is-4by3">';
            echo '        <img src="' . $basketballTeams[$_GET["basketballTeams"]]["imgUrl"] . '" style="object-fit:scale-down">';
            echo '    </figure>';
            echo '</div>';
          } else {
            $_SESSION['selectedTeam'] = -1;
          }
          ?>
          <form class="tile is-child" action="" method="GET">
            <div class="field">
              <label class="label">Favourite Basketball Team</label>
              <div class="control">
                <div class="select">
                  <select name="basketballTeams">
                    <option value="none">Select dropdown</option>
                    <?php
                    foreach ($basketballTeams as $key => $basketballTeam) {
                      $isSelected = $_SESSION['selectedTeam'] == $key;
                      echo '<option ' . ($isSelected ? 'selected' : '') . ' value="' . $key . '">' . $basketballTeam['name'] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <button class="button is-primary has-text-weight-bold" type="submit">
              <span class="icon is-small">
                <i class="far fa-paper-plane"></i>
              </span>
              <span>
                Submit
              </span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>