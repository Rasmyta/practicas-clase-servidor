<?php
    
	header("Access-Control-Allow-Origin: http://localhost");
    header('Content-Type: application/json');
    //$uri = 'https://v1.basketball.api-sports.io/leagues?country=Spain';
    $uri = 'https://v1.basketball.api-sports.io/standings?league=117&season=2020-2021';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'x-rapidapi-key : fbb2492c4e5cb243ee897046da86eca6';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    
    echo $response;
    

    
    



?>
