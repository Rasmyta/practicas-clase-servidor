<?php
function displayVote($asignatura, $vote)
{
  echo '  <div class="columns is-vcentered is-mobile">';
  echo '    <div class="column is-1">';
  echo '       <button id="decrement" name="vote" value="decrement-' . $asignatura . '" type="submit" class="button is-danger mr-4">';
  echo '         <span class="icon is-small">';
  echo '           <i class="fas fa-minus"></i>';
  echo '         </span>';
  echo '       </button>';
  echo '       <button id="increment" name="vote" value="increment-' . $asignatura . '" type="submit" class="button is-primary">';
  echo '         <span class="icon is-small">';
  echo '           <i class="fas fa-plus"></i>';
  echo '         </span>';
  echo '       </button>';
  echo '    </div>';
  echo '    <div class="column is-1 is-size-4">' . $asignatura . '</div>';
  echo '    <div class="column">';
  echo '      <progress id="' . $asignatura . '" class="progress is-primary" value="' . $vote . '" max="100"></progress>';
  echo '    </div>';
  echo '  </div>';
}
