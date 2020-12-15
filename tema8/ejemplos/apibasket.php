<?php
    
	//header('X-Auth-Token:7c112489898843e6b4949f49284587ed');
    $uri = 'https://v1.basketball.api-sports.io/leagues';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = array(
        'x-rapidapi-host' => 'v1.basketball.api-sports.io',
        'x-rapidapi-key' => 'fbb2492c4e5cb243ee897046da86eca6'
    );
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    
    echo $response;
    

    
    



?>
