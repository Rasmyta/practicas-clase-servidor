<!DOCTYPE HTML>
<html lang="en-US">
<head>
<title>HTML5 Local Storage Project</title>
<META charset="UTF-8">
<META name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<META NAME='rating' CONTENT='General' />
<META NAME='expires' CONTENT='never' />
<META NAME='language' CONTENT='Spanish, ES' />
<META name="description" content="Tienda Libros">
<META name="keywords" content="HTML5,CSS,JavaScript, html5 session storage, html5 local storage">
<META name="author" content="dcwebmakers.com">
<script src="js/Storage.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/StorageStyle.css">
<link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
</head>


<body onload="numCarro()">
	<a class="navbar-brand" href="index.php"><h2 class="text-primary">TIENDA LIBROS (HTML5 Storage)</h2></a>

	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="index.php">CATEGORÍAS</a>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Betseller <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item"><a class="nav-link" href="#">Histórica</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Negra</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Narrativa</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Ciencia Ficción</a></li>
				</ul>
				<ul class="navbar-nav float-right">
					<li><a href="carro.php"><img src="img/carro2.png" width="50px"></a><span id='numero'></span></li>
				</ul>
			</div>
		</nav>
	</header>

	<section>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse d-flex justify-content-between align-items-center" id="navbarSupportedContent">
				<div>
					<span>Ordenar por:</span>
					<select>
						<option>Título ascendente</option>
						<option>Título descendente</option>
						<option>Autor ascendente</option>
						<option>Autor descendente</option>							
					</select>
				</div>
				<div>
					<span>Buscar:</span>
					<input type='text' name='buscar' size='60'>
				</div>
			</div>
		</nav>
	</section>


	<section>

<?php
		//Pintamos los libros de la categoría que hayamos seleccionado
		//Consultamos a BD y mostramos los libros

		//Los creo de un array pero vosotros tenéis que sacarlos de la BBDD según la categoría seleccionada
		for($i=0; $i<5; $i++) {
			$libros[] = array("titulo" => "El nombre del viento",
							"autor" => "Patrick Rothfuss",
							"desc" => "Músico, ladrón, mago, asesino y héroe: ésta es la leyenda de Kvothe.",
							"precio" => 23.65,
							"paginas" => 880,
							"editorial" => "Plaza & Janes Editores",
							"isbn" => "978840135234"."$i",
							"img" => "https://imagessl8.casadellibro.com/a/l/t5/08/9788401337208.jpg");
		}
		for($i=0; $i<5; $i++) {
			$libros[] = array("titulo" => "Sidi",
							"autor" => "Arturo Pérez-Reverte",
							"desc" => "No tenía patria ni rey, sólo un puñado de hombres fieles. Así nace un mito.",
							"precio" => 19.85,
							"paginas" => 376,
							"editorial" => "Alfaguara",
							"isbn" => "978842043547"."$i",
							"img" => "https://imagessl3.casadellibro.com/a/l/t5/73/9788420435473.jpg");
		}

		foreach($libros as $libro) {
			echo "<article>";
			echo "<div class='card' style='width: 13rem;'>";
			echo "  <img class='card-img-top p-2' src='".$libro['img']."' alt='".$libro['titulo']."' height='280px'>";
			echo "		<div class='card-body'>";
			echo "			<h5 class='card-title'>".$libro['titulo']."</h5>";
			echo "			<h6 class='card-title'>".$libro['autor']."</h6>";
			//echo " 			<p class='card-text'>".$libro['desc']."</p>";
			echo "			<a href='#' class='btn btn-primary'  onclick='addItem(\"".$libro['isbn']."\",\"".$libro['titulo']."\",\"".$libro['autor']."\",\"".$libro['precio']."\")'>Comprar</a><span class='ml-3 text-danger'>".$libro['precio']." €</span>";
			echo "		</div>";
			echo "</div>";
			echo "</article>";	
		}

?>

	</section>

	<!-- Footer -->
	<footer class="page-footer font-small blue">

		<!-- Copyright -->
		<div class="footer-copyright text-center py-3">© 2019 Copyright:
			<a href="https://mdbootstrap.com/education/bootstrap/"> El profe de PHP</a>
		</div>
		<!-- Copyright -->

	</footer>
	<!-- Footer -->



</body>
</html>
