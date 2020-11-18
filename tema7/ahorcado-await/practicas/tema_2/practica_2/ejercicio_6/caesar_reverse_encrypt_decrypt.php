<?php
include(__DIR__ . "/../ejercicio_5/caesar_encrypt_decrypt.php");
include(__DIR__ . "/../ejercicio_6/reverse_word.php");

function CaReEncrypt($phrase, $clave)
{
  $result = "";

  foreach (explode(" ", $phrase) as $word) {
    $result .= reverseWord(encriptar($word, $clave)) . " ";
  }
  return $result;
}

function CaReDecrypt($phrase, $clave)
{
  $result = "";

  foreach (explode(" ", $phrase) as $word) {
    $result .= decriptar(reverseWord($word), $clave) . " ";
  }
  return $result;
}
