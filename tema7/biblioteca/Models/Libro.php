<?php
namespace Biblioteca;

/*
 * Clase Libro
 * Libros de la biblioteca
 */

 class Libro {

    private $id;
    private $ISBN;
    private $titulo;
    private $subtitulo;
    private $descripcion;
    private $autor;
    private $editorial;
    private $imagen;
    private $numejem;
    private $numejemdisp;

    //Constructor
    public function __construct($id=0,$ISBN="", $titulo="", $subtitulo="", $descripcion="", $autor="", $editorial="", $imagen="", $numejem=0, $numejemdisp=0) {
        $this->id = $id;
        $this->ISBN = $ISBN;
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        $this->descripcion = $descripcion;
        $this->autor = $autor;
        $this->editorial = $editorial;
        $this->imagen = $imagen;
        $this->numejem = $numejem;
        $this->numejemdisp = $numejemdisp; 
    }
    

    //Getters y setters

    public function getId() {
        return $this->id;
    }

    public function getISBN() {
        return $this->ISBN;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getSubtitulo() {
        return $this->subtitulo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getEditorial() {
        return $this->editorial;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getNumejem() {
        return $this->numejem;
    }

    public function getNumejemdisp() {
        return $this->numejemdisp;
    }

    public function setISBN($ISBN) {
        $this->ISBN = $ISBN;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function setEditorial($editorial) {
        $this->editorial = $editorial;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function setNumejem($numejem) {
        $this->numejem = $numejem;
    }

    public function setNumejemdisp($numejemdisp) {
        $this->numejemdisp = $numejemdisp;
    }



 }



?>