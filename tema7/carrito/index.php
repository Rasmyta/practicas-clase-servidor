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
		
		//Recuperamos el carro de la sesión
		if (!isset($_SESSION['carrito'])) {
			$carro = new CarroCompra();
			$_SESSION['carrito'] = serialize($carro);
		} else {
			$carro = unserialize($_SESSION['carrito']);
		}

		//Recuperar los productos de la BD como objetos
		$productos = ProductoDB::getProductos();
		VistaIndex::render($productos,$carro->count());
				
?>    

        <section id="content">

        </section>


<script src="js/jquery-3.4.1.min.js"></script>

<script defer>
	//Script para consultar los productos de la tienda

	$('#verCarro').click(function() {
		alert('Hola');
		$.ajax({
			type: 'GET',
			url: 'Controllers/controller.php',
			data: "accion=mostrarCarro",
			success: function(response) {
				//El resultado lo metemos en el section principal
				$("#content").html(response);
				
			}
		});		
	});

	//Script para pulsar el botón de comprar una vez mostrados los productos
	function comprar(id) {
		$.ajax({
			type: 'GET',
			url: 'Controllers/controller.php',
			data: "accion=comprar&id=" + id,
			success: function(response) {
				//El resultado lo metemos en el section principal
				$("#contador").html(response);
				
			}
		});
	}
	
	//Ajax para ver el carro
	function verCarro (){
		$.ajax({
			type: 'GET',
			url: 'Controllers/controller.php',
			data: "accion=mostrarCarro",
			success: function(response) {
				//El resultado lo metemos en el section principal
				$("#content").html(response);
				
			}
		});
	}

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

</script>

</body>
</html>


