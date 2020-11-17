<?php

abstract class Plantilla
{
	 private $html; //Nuestra plantilla original
	 protected $htmlGenerado; //Nuestra plantilla con los valores sustituidos del array

	 public function __construct($html){
		 $this->html = $html;
		 $this->htmlGenerado = "";
	 }

	 private function cargarDatos($diccionario){
	 	$this->htmlGenerado = $this->html;
	 	foreach ($diccionario as $key => $value) {
	 		$this->htmlGenerado = str_replace("%$key%", $value, $this->htmlGenerado);
	 	}
	 }

	 protected abstract function render();

	 public function renderData($diccionario){
	 	$this->cargarDatos($diccionario);
	 	$this->render();
	 }
}


