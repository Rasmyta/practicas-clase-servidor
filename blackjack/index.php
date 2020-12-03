
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Blackjack</h1>
    <button id='pedirc'>Pedir Carta</button>
    <section id='contenedor'>


    </section>

<script>
    document.getElementById('pedirc').addEventListener("click", async function() {
        console.log("Entra");
		let formData = new FormData();
		formData.append("action", "pedircarta"); 

		let res = await fetch("controller.php", {
			method: "POST",
			body: formData,
		});
		let data = await res.text();		
		document.getElementById("contenedor").innerHTML = data;
	});


</script>

</body>
</html>