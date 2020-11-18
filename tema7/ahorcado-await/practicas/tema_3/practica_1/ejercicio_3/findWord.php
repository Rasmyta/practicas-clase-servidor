<?php

/**
 * Finds a word in the whole dictionary
 * Returns the word and which dictionary it was found
 * 
 */
function findWord($word, $dict)
{
  $englishDict = array_keys($dict);
  $spanishDict = array_values($dict);

  $wordIndex = array_search($word, $englishDict);
  if ($wordIndex != false) {
    return ["english", $englishDict[$wordIndex]];
  } else {
    $wordIndex = array_search($word, $spanishDict);
    if ($wordIndex != false) {
      return ["spanish", $spanishDict[$wordIndex]];
    }
  }

  return null;
}
