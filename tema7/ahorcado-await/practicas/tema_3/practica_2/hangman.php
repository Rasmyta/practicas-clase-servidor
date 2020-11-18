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
  <style>
    .is-invisible {
      visibility: hidden;
    }
  </style>
  <div id="debug">

  </div>
  <div class="box">
    <div class="columns">
      <div class="column is-narrow">
        <div><button id="new-game-btn" class="button is-dark is-outlined mb-6">Start new game</button></div>
        <div class="level">
          <div id="status" class="level-item is-size-1 has-text-danger has-text-weight-bold" style="height: 4rem">
          </div>
        </div>
        <!-- Generator: Adobe Illustrator 24.1.3, SVG Export Plug-In  -->
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="400" height="400" viewBox="0 0 641.4 953.5" style="overflow:visible;enable-background:new 0 0 641.4 953.5;" xml:space="preserve">
          <style type="text/css">
            .st0 {
              fill: none;
              stroke: #000000;
              stroke-width: 40;
              stroke-miterlimit: 10;
            }

            .st1 {
              fill: none;
              stroke: #414042;
              stroke-width: 16;
              stroke-miterlimit: 10;
            }

            .st2 {
              fill: #EADFC1;
              stroke: #414042;
              stroke-width: 16;
              stroke-miterlimit: 10;
            }

            .st3 {
              fill: #885522;
              stroke: #414042;
              stroke-width: 16;
              stroke-miterlimit: 10;
            }

            .st4 {
              fill: #FFFFFF;
              stroke: #414042;
              stroke-width: 16;
              stroke-linecap: round;
              stroke-miterlimit: 10;
            }

            .st5 {
              fill: none;
              stroke: #000000;
              stroke-width: 30;
              stroke-miterlimit: 10;
            }

            .st6 {
              fill: url(#SVGID_1_);
            }

            .st7 {
              fill: #FFFFFF;
            }

            .st8 {
              fill: url(#SVGID_2_);
            }
          </style>
          <defs>
          </defs>
          <g id="pole_1_">
            <path id="body" class="body-part st0" data-order=2 d="M520.4,676c0,0-17.5-210.8,3.2-269.7" />
            <path class="st1" d="M520.4,353.3c0,0-65.8,45.4-39.1,81.8c26.7,36.3,65.9,27.8,86.9,0C589.2,407.3,520.4,353.3,520.4,353.3z" />
            <g>
              <polyline class="st2" points="540.5,62.1 540.5,323.4 499.4,323.4 499.4,62.1 		" />
            </g>
            <path class="st2" d="M549.8,350.7h-59c-12.1,0-21.9-9.8-21.9-21.9v-1.3c0-12.1,9.8-21.9,21.9-21.9h59c12.1,0,21.9,9.8,21.9,21.9
		v1.3C571.8,340.9,562,350.7,549.8,350.7z" />
            <path class="st3" d="M134.8,255.7l-28.2-28c-2.4-2.4-2.4-6.3,0-8.7L302.8,21.6c2.4-2.4,6.3-2.4,8.7,0l28.2,28
		c2.4,2.4,2.4,6.3,0,8.7L143.5,255.7C141.1,258.1,137.2,258.1,134.8,255.7z" />
            <line class="st4" x1="8" y1="945.5" x2="250.2" y2="945.5" />
            <path class="st3" d="M150.4,944.6h-39.7c-3.4,0-6.1-2.7-6.1-6.1V14.9c0-3.4,2.7-6.1,6.1-6.1h39.7c3.4,0,6.1,2.7,6.1,6.1v923.5
		C156.6,941.8,153.8,944.6,150.4,944.6z" />
            <path class="st3" d="M84.8,53.8V14.1c0-3.4,2.7-6.1,6.1-6.1h527.2c3.4,0,6.1,2.7,6.1,6.1v39.7c0,3.4-2.7,6.1-6.1,6.1H90.9
		C87.5,60,84.8,57.2,84.8,53.8z" />
          </g>
          <line id="left-arm" class="body-part st5" data-order=3 x1="508.4" y1="487.2" x2="391.3" y2="564.9" />
          <line id="right-arm" class="body-part st5" data-order=4 x1="528" y1="494" x2="636" y2="536" />
          <line id="left-leg" class="body-part st5" data-order=5 x1="514.4" y1="656.8" x2="435.3" y2="782.7" />
          <line id="right-leg" class="body-part st5" data-order=6 x1="525.5" y1="661.6" x2="597.1" y2="777.8" />
          <g class="body-part" id="head" data-order=1>
            <radialGradient id="SVGID_1_" cx="523.51" cy="398.3985" r="52.6242" gradientUnits="userSpaceOnUse">
              <stop offset="0.5744" style="stop-color:#000000" />
              <stop offset="0.7977" style="stop-color:#000000" />
              <stop offset="1" style="stop-color:#000000" />
            </radialGradient>
            <circle class="st6" cx="523.5" cy="398.4" r="52.6" />
            <path class="st7" d="M508.2,382.1c0,2.6-3.1,4.7-6.9,4.7c-3.8,0-6.9-2.1-6.9-4.7s3.1-4.7,6.9-4.7
		C505.2,377.4,508.2,379.5,508.2,382.1z" />
            <path class="st7" d="M555.1,382.1c0,2.6-3.1,4.7-6.9,4.7c-3.8,0-6.9-2.1-6.9-4.7s3.1-4.7,6.9-4.7
		C552.1,377.4,555.1,379.5,555.1,382.1z" />
            <path class="st7" d="M501.4,423.1c16.6-11.9,40,0,40,0" />
          </g>
        </svg>
      </div>
      <div class="column" style="display:flex; flex-direction:column;justify-content:center;align-items:start">
        <div class="content is-large mb-6 ml-1">
          <p id="puzzled-word" class="title is-1">_ _ _ _</p>
          <pclass="subtitle">Fails: <span id="fails">0</span></p>
        </div>
        <div id="letters-container">
          <button class="button p-4 m-1">A</button>
          <button class="button p-4 m-1">B</button>
          <button class="button p-4 m-1">C</button>
          <button class="button p-4 m-1">D</button>
          <button class="button p-4 m-1">E</button>
          <button class="button p-4 m-1">F</button>
          <button class="button p-4 m-1">G</button>
          <button class="button p-4 m-1">H</button>
          <button class="button p-4 m-1">I</button>
          <button class="button p-4 m-1">K</button>
          <button class="button p-4 m-1">L</button>
          <button class="button p-4 m-1">M</button>
          <button class="button p-4 m-1">N</button>
          <button class="button p-4 m-1">O</button>
          <button class="button p-4 m-1">P</button>
          <button class="button p-4 m-1">Q</button>
          <button class="button p-4 m-1">R</button>
          <button class="button p-4 m-1">S</button>
          <button class="button p-4 m-1">T</button>
          <button class="button p-4 m-1">U</button>
          <button class="button p-4 m-1">V</button>
          <button class="button p-4 m-1">W</button>
          <button class="button p-4 m-1">X</button>
          <button class="button p-4 m-1">Y</button>
          <button class="button p-4 m-1">Z</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="hangman/script.js">
</script>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>