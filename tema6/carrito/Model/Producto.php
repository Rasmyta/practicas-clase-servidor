<?php
namespace Carrodelacompra;

/*
 * Clase Producto
 * Productos de la tienda, lo que sea
 * Nombre, descripción, precio, iva a aplicar, imagen
 */

 class Producto {

    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $iva;
    private $imagen;

    //Constructor
    public function __construct($unId=0,$unNombre="", $unaDescripcion="", $unPrecio=0, $unaImagen="", $unIva=1.21) {
        $this->id = $unId;
        $this->nombre = $unNombre;
        $this->descripcion = $unaDescripcion;
        $this->precio = $unPrecio;
        $this->imagen = $unaImagen;
        $this->iva = $unIva;
    }
    

    //Getters y setters

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getIva() {
        return $this->iva;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setNombre($unNombre) {
        $this->nombre = $unNombre;
    }

    public function setDescripcion($unaDescripcion) {
        $this->descripcion = $unaDescripcion;
    }

    public function setPrecio($unPrecio) {
        $this->precio = $unPrecio;
    }

    public function setIva($unIva) {
        $this->iva = $unIva;
    }

    public function setImagen($unaImagen) {
        $this->imagen = $unaImagen;
    }


 }



?>