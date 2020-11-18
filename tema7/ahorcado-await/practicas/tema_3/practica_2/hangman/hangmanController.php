<?php
session_start();

if (!isset($_SESSION['word'])) {
  $_SESSION['word'] = generateNewWord();
  $_SESSION['puzzledWord'] = createPuzzledWord($_SESSION['word']);
  $_SESSION['fails'] = 0;
}

if (isset($_POST['action'])) {
  $res = 'error';
  switch ($_POST['action']) {
    case 'getPuzzledWord':
      $_SESSION['word'] = generateNewWord();
      $_SESSION['fails'] = 0;
      $res = $_SESSION['puzzledWord'] = createPuzzledWord($_SESSION['word']);
      break;
    case 'checkLetterInPuzzledWord':
      $letter = strtolower($_POST['letter']);
      if (strpos($_SESSION['word'], $letter) !== false && strpos($_SESSION['puzzledWord'], $letter) === false) {
        $res = $_SESSION['puzzledWord'] = completeLetterInPuzzledWord($_SESSION['word'], $_SESSION['puzzledWord'], $letter);
      } else {
        $_SESSION['fails'] += 1;
        $res = 'letterNotFound';
      }
      break;
    case 'getFails':
      $res = $_SESSION['fails'];
      break;
    case 'checkHasWon':
      $res = $_SESSION['puzzledWord'] == $_SESSION['word'];
      break;
    case 'debug':
      $res = '
        <div class="content mb-4"> 
          <p>
            Use this debug values for easy testing:
          </p>
          <p>
            Word: ' . $_SESSION['word'] . '<br>
          </p>
          <p>
            PuzzledWord: ' . $_SESSION['puzzledWord'] . '<br>
          </p>
        </div>
      ';
      break;
  }

  echo $res;
}

function generateNewWord()
{
  include('dictionary.php');
  return $dictionary[rand(0, count($dictionary) - 1)];
}

function createPuzzledWord($word)
{
  // get the unique letters in word
  $lettersToRemove = array_unique(str_split($word));
  // decide how many letter to remove
  $numOfLettersToRemove = rand(2, count($lettersToRemove) - 2);

  // filter letters to remove 
  for ($i = 0; $i < $numOfLettersToRemove; $i++) {
    unset($lettersToRemove[rand(0, count($lettersToRemove) - 1)]);
    $lettersToRemove = array_values($lettersToRemove);
  }

  // create the puzzled word
  $wordLength = strlen($word);
  for ($i = 0; $i < $wordLength; $i++) {
    for ($j = 0; $j < count($lettersToRemove); $j++) {
      if ($lettersToRemove[$j] == $word[$i]) {
        $word[$i] = '_';
        break;
      }
    }
  }

  return $word;
}

function completeLetterInPuzzledWord($word, $puzzledWord, $letter)
{
  for ($i = 0; $i < strlen($word); $i++) {
    if ($letter == $word[$i] && $puzzledWord[$i] == "_") {
      $puzzledWord[$i] = $letter;
    }
  }

  return $puzzledWord;
}
