
//Añadir nuevo libro al carro de la compra
function addItem(isbn, titulo, autor, precio) {
	if (localStorage.getItem(isbn) == null) {
		var object = { 'isbn': isbn, 'titulo' : titulo, 'autor' : autor, 'precio' : precio, 'cantidad' : 1 };
		localStorage.setItem(isbn, JSON.stringify(object));
	} else {
		var libro = JSON.parse(localStorage.getItem(isbn));
		cant = parseInt(libro.cantidad,10) + 1;
		var object = { 'isbn': isbn, 'titulo' : titulo, 'autor' : autor, 'precio' : precio, 'cantidad' : cant };
		localStorage.setItem(isbn, JSON.stringify(object));
	}
	document.getElementById('numero').innerHTML = localStorage.length;
}
//------------------------------------------------------------------------------

//Pinta el dígito del carro de la compra
function numCarro() {
	document.getElementById('numero').innerHTML = localStorage.length;
}
//------------------------------------------------------------------------------

//Pinta el carro de la compra
function pintar() {
	if (CheckBrowser()) {
		numCarro();
		var key = "";
		var list = "<thead class='thead-light'>";
		list += "<tr><th>ISBN</th><th>Título</th><th>Autor</th><th>Precio</th><th>Cantidad</th><th>Borrar</th></tr>\n";
		list += "</thead>";
		var i = 0;
		total = 0;
		//Se podría controlar un máximo de items en el carro, o una paginación.
		for (i = 0; i <= localStorage.length-1; i++) {
			key = localStorage.key(i);
			var libro = JSON.parse(localStorage.getItem(key));
			list += "<tr><td>" + key + "</td>\n"
					+"<td>" + libro.titulo + "</td>\n"
					+"<td>" + libro.autor + "</td>\n"
					+"<td>" + libro.precio + "</td>\n"
					+"<td>" + libro.cantidad + "</td>\n"
					+"<td><input type='button' name='delete' value='X' onclick='RemoveItem(" + key +")'></td>\n"
					+"</tr>\n";
			total += libro.precio * libro.cantidad;
		}
		total = parseFloat(total).toFixed( 2 ); //Mostrar total con dos decimales
		list += "<tr><td>TOTAL</td><td colspan='4'><strong>" + total + " €</strong></td></tr>";

		//Metemos el html con los productos del carro en la tabla del html
		//Se puede hacer con JQuery
		document.getElementById('list').innerHTML = list;
	} else {
		alert('No soporta HTML 5 y no puedes manejar este carro de la compra.');
	}
}
//------------------------------------------------------------------------------

//Toma lo que hay en localstorage y lo manda por Ajax a comprar.php, donde se hace la compra del pedido en BBDD
function Comprar() {

	var libros = new Array();
	//Sacar todos los elementos del carro en Localstorage
	for (i = 0; i <= localStorage.length-1; i++) {
		key = localStorage.key(i);
		var libro = JSON.parse(localStorage.getItem(key));
		libros.push(libro);
	}

	//Mandarlos por Ajax para que se haga el pedido en PHP (BBDD)
	$.ajax({
		type: "POST",
		url: "comprar.php",         
		data:  {data: libros},
		success: function(data) {
		   $('#pedido').html(data);
		   ClearAll();
		}
	 });
}
//-------------------------------------------------------------------------------------

//Borra un item del espacio de almacenamiento. Hay que pasarle una key, el isbn del libro
function RemoveItem(unItem) {
	localStorage.removeItem(unItem);
	pintar();
}
//-------------------------------------------------------------------------------------

//Restauramos el almacenamiento local, vaya que lo borramos
function ClearAll() {
	localStorage.clear();
	pintar();
}

//Comprobamos que el navegador soporta LocalStorage. Todos los actuales lo hacen, los que soportan HTML5
function CheckBrowser() {
	if ('localStorage' in window && window['localStorage'] !== null) {
		// we can use localStorage object to store data
		return true;
	} else {
			return false;
	}
}
//------------------------------------------------------------------------------------
