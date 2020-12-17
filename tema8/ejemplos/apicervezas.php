<?php

    $pag=0;
    $adelante=1;
    $atras=0;

    //Paginador
    if (isset($_GET['p'])) {
    	$pag = $_GET['p'];
        //última página
    	if ($pag >= 23) {
	    	$adelante = 23;
    		$atras = 22;
        //primera página
    	} elseif ($pag <= 0) {
    		$adelante = 1;
    		$atras = 0;
        //cualquier otra página
        } else {
    		$adelante = $pag + 1;
    		$atras = $pag - 1;
    	}
    } 

    //Dos enlaces hacia adelante y hacia atrás
    echo "<a href='apicervezas.php?p=$atras'>Atrás</a>&nbsp;&nbsp;";
    echo "<a href='apicervezas.php?p=$adelante'>Adelante</a><br>";


    $uri = 'https://sandbox-api.brewerydb.com/v2/beers?p='.$pag.'&key=a1dc1446191ebea66072bac6e03a13f6';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: a1dc1446191ebea66072bac6e03a13f6';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    //Decodificamos el json que recibimos y lo convertimos a objeto
    $objeto = json_decode($response);

    //Me recorro el objeto con las cervezas
    //Es un array dentro de la etiqueta "data"
    foreach($objeto->data as $birra) {
        //echo $birra->nameDisplay."<br>";
        if (isset($birra->labels)) {
            echo "<a href='verbirra.php?id=".$birra->id."'><img src='".$birra->labels->icon."'><span>$birra->name</span></a><br>";
        }
    }

?>
