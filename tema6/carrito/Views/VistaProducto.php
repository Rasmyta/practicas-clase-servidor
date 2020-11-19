<?php
namespace Carrodelacompra;

class VistaProducto {

    public static function render() {

        
        include_once("_cabecera.php");

?>

<div class="container">
  <div class="row">

<form action="Controllers/controller.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" aria-describedby="nombreHelp">    
  </div>
  <div class="form-group">
    <label for="descripcion">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" aria-describedby="nombreHelp">    
  </div>
  <div class="form-group">
    <label for="precio">Precio</label>
    <input type="text" class="form-control" name="precio" aria-describedby="nombreHelp">    
  </div>  
  <div class="form-group">
    <label for="imagen">Imagen</label>
    <input type="file" class="form-control" name="imagen" aria-describedby="nombreHelp">    
  </div>  
  <div class="form-group">
    <label for="iva">IVA</label>
    <input type="text" class="form-control" name="iva" aria-describedby="nombreHelp">    
  </div>  
  <input type="submit" name="addProduct" class="btn btn-primary" value="Submit">
</form>

        </div>
    </div>

<?php

    }
}

?>