		<?php
		//CON JSON
		$ciudad = $_POST['ciudad'];
		$pais = $_POST['pais'];
		$json = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$ciudad.",".$pais."&units=metric&appid=a011d4a9483864c905c638dbb9044cd6"); 

		//Pasar el json a un objeto que pueda leer PHP
		$objeto = json_decode($json);
		echo $objeto->name.":".$objeto->main->temp." grados. Sensación térmica: ".$objeto->main->feels_like;
		echo "<img src='http://openweathermap.org/img/w/".$objeto->weather[0]->icon.".png'>";
		?>
