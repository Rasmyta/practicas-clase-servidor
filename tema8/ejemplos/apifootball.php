<?php
    
	//header('X-Auth-Token:7c112489898843e6b4949f49284587ed');
    $uri = 'http://api.football-data.org/v2/competitions/PD/scorers';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: ';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $datos = json_decode($response);
    //Datos de goleadores
    foreach($datos->scorers as $scorer) {
        echo $scorer->player->name."  del  ".$scorer->team->name."  ha marcado  ".$scorer->numberOfGoals."  goles.<br>";
    }

    echo "<br><br>";

    $uri = 'http://api.football-data.org/v2/competitions/PD/standings?standingType=TOTAL';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: ';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $datos = json_decode($response);
    //Clasificación de los equipos en la competición
    foreach($datos->standings[0]->table as $equipo) {
        echo $equipo->team->name." - ".$equipo->points."<br>";
    }

    



?>
