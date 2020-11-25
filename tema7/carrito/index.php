<?php
session_start();

include_once("autoload.php");
use Carrodelacompra\CarroCompra;
use Carrodelacompra\ProductoDB;
use Carrodelacompra\VistaIndex;


	if (!isset($_SESSION['carrito'])) {
		$carro = new CarroCompra();
		$_SESSION['carrito'] = serialize($carro);
	} else {
		$carro = unserialize($_SESSION['carrito']);
	}

	include_once("Views/_cabecera.php");
	
	echo "<section id='content'>";

	//Recuperar los productos de la BD como objetos
	$productos = ProductoDB::getProductos();
	VistaIndex::render($productos,$carro->count());

	echo "</section>";
				
?>    

<script src="js/jquery-3.4.1.min.js"></script>

<script>
/*
	//Script para consultar los productos de la tienda
	$('#inicio').click(function() {
		$.ajax({
			type: 'GET',
			url: 'Controllers/controller.php',
			data: "accion=mostrar",
			success: function(response) {
				//El resultado lo metemos en el section principal
				$("#content").html(response);
				
			}
		});		
	});
*/

/*
	//Ajax de mostrar productos con get
	$(document).ready( function() {
		$.get("Controllers/controller.php",{ accion : "mostrar"},function(respuesta) {
			$("#content").html(respuesta);
		});
	});
*/

/*
	//Ajax de mostrar el carro con get
	$('#verCarro').click(function() {
		$.get("Controllers/controller.php",{ accion : "mostrarCarro"},function(respuesta) {
			$("#content").html(respuesta);
		});	
	});
*/

/*
	//Ajax de mostrar el carro con load
	$('#verCarro').click(function() {
		$("#content").load("Controllers/controller.php",{accion : "mostrarCarro"});
	});
*/
	$('#verCarro').click(function() {
		$.get("Controllers/controller.php",{ accion : "mostrarCarro"},function(respuesta) {
			$("#content").html(respuesta);
		});
	});


	//Script para pulsar el botón de comprar (para todos los botones) una vez mostrados los productos
	$( ".comprar" ).each(function() {
    	$(this).click( function(){
			var unId = $(this).attr('id');
			var parametros = { accion: "comprar", id: unId };
			$.post("Controllers/controller.php",parametros, function(response) {
					$("#contador").html(response);
			});
		});
	});

	//Ajax para botón de más cantidad en el carro
	function cambiarCantidad (productoId, tipo){
		$.ajax({
			type: 'GET',
			url: 'Controllers/controller.php',
			data: "accion=cambiar&id=" + productoId + "&tipo=" + tipo,
			success: function(response) {
				//El resultado lo metemos en el section principal
				$("#content").html(response);
			}
		});
	}


	//Ajax para borrar una línea del carro
	function deleteLinea (productoId){
		$.ajax({
			type: 'GET',
			url: 'Controllers/controller.php',
			data: "accion=deleteLinea&id=" + productoId,
			success: function(response) {
				//El resultado lo metemos en el section principal
				$("#content").html(response);
			}
		});
	}	

	function inicio() {
		$("#content").load("Controllers/controller.php",{accion : "mostrar"});
	}

</script>

</body>
</html>


