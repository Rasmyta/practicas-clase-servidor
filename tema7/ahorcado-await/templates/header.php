 <?php
  session_start();
  include_once(__DIR__ . "/../config.php");

  $temas = array_diff(scandir(__DIR__ . "/../practicas"), array(".", ".."));
  natcasesort($temas);
  $phpSelfArr = explode("/", $_SERVER["PHP_SELF"]);
  $activePage =  implode("/", array_slice($phpSelfArr, count($phpSelfArr) - 3, 3));
  ?>
 <html lang="en">

 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Practicas DWS</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
   <link rel="stylesheet" property="stylesheet" href="ejercicio_5/bulma-calendar-extension/css/bulma-calendar.min.css">
   <style>
     body {
       overflow: hidden;
     }

     .is-hidden {
       display: none;
     }

     .is-fullview-width {
       min-width: 100vw;
     }

     .side-navbar {
       min-height: 100vh;
       height: 100%;
       overflow-y: auto;
       min-width: 18rem;
     }

     #navbar {
       position: fixed;
     }

     #main-container {
       height: 100%;
       min-height: 100vh;
     }
   </style>
 </head>

 <body>
   <div class="columns is-mobile">
     <navbar id="navbar" class="side-navbar column is-2 section has-background-white">
       <a class="is-size-4" href=<?= SITE_URL . "index.php" ?>><strong>Home</strong></a>
       <?php
        foreach ($temas as $tema) {
          $absolutePathToPracticas = __DIR__ . '/../practicas/';
          $temaFormated = str_replace("_", " ", $tema);
          $practicas = array_diff(scandir($absolutePathToPracticas . $tema), array(".", ".."));
          natcasesort($practicas);
          echo '<details class="mt-2" id="' . $tema . '">';
          echo '<summary class="menu-label">' . $temaFormated .  '</summary>';
          echo '<ul class="menu-list">';
          foreach ($practicas as $practica) {
            $practicaFormated = str_replace("_", " ", $practica);
            $ejercicios = array_diff(scandir($absolutePathToPracticas . $tema . '/' . $practica), array(".", ".."));
            natcasesort($ejercicios);
            echo '<details class="mt-2 ml-2" id="' . $tema . '-' . $practica . '">';
            echo '<summary class="menu-label">' . $practicaFormated .  '</summary>';
            echo '<ul class="menu-list">';
            foreach ($ejercicios as $ejercicio) {
              $ejercicioFormated = explode(".", str_replace("_", " ", $ejercicio))[0];
              $pathToPage = $tema . '/' . $practica . '/' . $ejercicio;;
              $absolutePathToEjercicio = $absolutePathToPracticas . $pathToPage;

              if (is_file($absolutePathToEjercicio)) {
                if ($pathToPage == $activePage) {
                  $_SESSION["currentPagePath"] = $pathToPage;
                  echo '<li><a class="is-active" href="' . SITE_URL . 'practicas/' . $pathToPage . '">' . $ejercicioFormated . '</a></li>';
                } else {
                  echo '<li><a href="' . SITE_URL . 'practicas/' . $pathToPage . '">' . $ejercicioFormated . '</a></li>';
                }
              }
            }
            echo '</ul>';
            echo '</details>';
          }
          echo '</ul>';
          echo '</details>';
        }
        ?>
     </navbar>
     <!-- This div is a placeholder with the same size as navbar so it will push the right column instead of overlapping -->
     <div id="fake-navbar" class="side-navbar is-2 column section"></div>
     <div id="main-container" class="is-fullview-width column section has-background-light">
       <button class="button has-background-dark mb-4" id="toggle-navbar" style="position: fixed;">
         <span class="icon has-text-white"><i class="fas fa-bars"></i></span>
       </button>
       <div style="height:4rem"></div>