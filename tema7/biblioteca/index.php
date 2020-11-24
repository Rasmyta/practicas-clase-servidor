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
	<title>Biblioteca</title>
</head>
<body>

<div class='container'>
	<h1 class='text-primary'>BIBLIOTECA</h1>
	<h4 class='text-success'>LIBROS</h4>

	<section id='container'></section>
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

		await buttonsBooksActions();
	}

	//Acciones de los botones de cada libro
	async function buttonsBooksActions() {
		//Los botones de los libros llevan el class books. 
		//Les asocio una función que dependiendo de si es delete o update hará una cosa u otra
		let booksButtons = document.querySelectorAll(".books");
  		booksButtons.forEach((booksButton) => booksButton.addEventListener("click", booksActions));		
	}

	//Acciones delete y update para un libro
	async function booksActions(e) {
		//Vemos el botón que se ha pulsado y la acción correspondiente
		let action = e.target.closest("button").getAttribute('action');

		//Si la acción es eliminar usamos otra función asíncrona que llame al controlador y borre el libro
		if (action == 'delete') {
			await deleteBook(e.target.closest("button").value);
		}
	}

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


