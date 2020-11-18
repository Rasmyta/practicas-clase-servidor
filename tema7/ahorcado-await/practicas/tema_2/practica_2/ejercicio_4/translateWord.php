<?php

/**
 * returns an array where index[0] => language(english or spanish) and index[1] => the word translated
 * if the word is not found it will return null;
 */
function translateWord($randomWord, $word_list_en, $word_list_es)
{

  $wordIndex = array_search($randomWord, $word_list_en);
  if ($wordIndex != false) {
    return ['spanish', $word_list_es[$wordIndex]];
  } else {
    $wordIndex = array_search($randomWord, $word_list_es);
    if ($wordIndex != false) {
      return ['english', $word_list_en[$wordIndex]];
    }
  }

  return null;
}
