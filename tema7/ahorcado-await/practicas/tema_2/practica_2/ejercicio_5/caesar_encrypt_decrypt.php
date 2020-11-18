<?php
function encriptar($mensaje, $clave)
{
  $result = "";

  foreach (str_split($mensaje) as $char) {
    // range for UPPERCASE => 65 - 90
    // range for lowercase => 97 - 122
    $asciiCode = ord($char);
    if ($asciiCode > 64 && $asciiCode < 91) {
      $result .= chr((($asciiCode + $clave - 65) % 26) + 65);
    } elseif ($asciiCode > 96 && $asciiCode < 123) {
      $result .= chr((($asciiCode + $clave - 97) % 26) + 97);
    } else {
      $result .= $char;
    }
  }

  return $result;
}

function decriptar($mensaje, $clave)
{
  $result = "";

  foreach (str_split($mensaje) as $char) {
    // range for UPPERCASE => 65 - 90
    // range for lowercase => 97 - 122
    $asciiCode = ord($char);
    if ($asciiCode > 64 && $asciiCode < 91) {
      $result .= chr((($asciiCode - $clave - 90) % 26) + 90);
    } elseif ($asciiCode > 96 && $asciiCode < 123) {
      $result .= chr((($asciiCode - $clave - 122) % 26) + 122);
    } else {
      $result .= $char;
    }
  }

  return $result;
}
