<?php
session_start();

include_once("autoload.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>	
	<title>Biblioteca</title>
</head>
<body>

<div class='container'>
	<h1 class='text-primary'>BIBLIOTECA</h1>
	<h4 class='text-success'>LIBROS</h4>

	<button class='text-primary' id='nuevolibro' data-toggle="modal" data-target="#exampleModal">Nuevo Libro</button>

	<section id='container'></section>
</div>


<div id='minsertar' class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nuevo Libro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='formlibro'>
          <div class="form-group">
            <label>Titulo</label>          
            <input type='text' name='titulo' class="form-control"> 
          </div>
          <div class="form-group">
            <label>Subtítulo</label>
            <input type="text" name="subtitulo" id="" class="form-control">
          </div>
          <div class="form-group">
            <label>Descripcion</label>
            <input type="text" name="descripcion" id="" class="form-control">
          </div>
          <div class="form-group">
            <label>Autor</label>
            <input type="text" name="autor" id="" class="form-control">
          </div>
          <div class="form-group">
            <label>Editorial</label>
            <input type="text" name="editorial" id="" class="form-control">
          </div>
          <div class="form-group">
            <label>Imagen</label>
            <input type="text" name="imagen" id="" class="form-control">
          </div>
          <div class="form-group">
            <label>Número ejemplares</label>
            <input type="text" name="numejem" id="" class="form-control">
          </div>
          <div class="form-group">
            <label>Número ejemplares disponibles</label>
            <input type="text" name="numejemdisp" id="" class="form-control">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" action='insert'>Insert</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

	  </form>
    </div>
  </div>
</div>

<script>
	//Cargar contenido principal
	document.addEventListener("DOMContentLoaded", async () => {
  		await loadBooks();
	});


	//Carga libros de la BD y los pone en el contenedor
	async function loadBooks() {
		//Lo que enviamos con POST, la acción al controlador de cargar los libros
		let formData = new FormData();
    	formData.append("action", "loadBooks");

		//Consulta asíncrona al controlador
		let res = await fetch("Controllers/controller.php", {
			method: "POST",
			body: formData,
		});
		let data = await res.text();

		//Pintamos la respuesta en el contenedor
		document.getElementById("container").innerHTML = data;
	}


	//Se puede asociar el evento click al contenedor y luego se comprueba qué se
	//ha pulsado. Como un controlador de botones
	document.getElementById("container").addEventListener("click", async function(e)  {
		if (e.target.closest("button[action=delete]")) {
			await deleteBook(e.target.closest("button").value);
		}
	});

	//Botón submit del formulario dentro del modal 
	//En e.target lleva todos los input del formulario
	document.getElementById("formlibro").addEventListener("submit", async function(e) {
		e.preventDefault(); //Para que no envíe el formulario antes
		console.log("Algo");
		let formData = new FormData(e.target);
		formData.append("action", "newBook"); //Acción al controlador para insertar

		let res = await fetch("Controllers/controller.php", {
			method: "POST",
			body: formData,
		});
		let data = await res.text();

		//Pintamos la respuesta en el contenedor
		document.getElementById("container").innerHTML = data;
		//Cerramos el modal
		$('#minsertar').modal('hide');
	});

	document.getElementById('nuevolibro').addEventListener("click", function() {
		$('#minsertar').modal('show');
	});

	//Función para borrar un libro
	async function deleteBook(id) {
		//Lo que enviamos con POST, la acción al controlador de borrar un libro
		let formData = new FormData();
    	formData.append("action", "deleteBook");
		formData.append("id",id);

		//Consulta asíncrona al controlador
		let res = await fetch("Controllers/controller.php", {
			method: "POST",
			body: formData,
		});
		let data = await res.text();

		//Pintamos la respuesta en el contenedor
		document.getElementById("container").innerHTML = data;		
	}

</script>

</body>
</html>


