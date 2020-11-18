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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/Storage.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/StorageStyle.css">
<link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
</head>


<body onload="pintar()">

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

	<form name=ShoppingList>
		<div id="items_table">
			<h3>Carro de la compra:</h3>
			<table class='table' id='list'></table>

			<p>
				<label id='pedido'></label><br>
				<label>
					<input class='mt-2' type='button' value="Vaciar" onclick="ClearAll()">
				</label>
				<label>
					<input class='mt-2' type='button' value="Comprar" onclick="Comprar()">
				</label>
			</p>
		</div>
	</form>

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
