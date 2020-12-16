<?php

    $uri = 'https://www.googleapis.com/books/v1/volumes?q=hombres+buenos';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: ';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $matches = json_decode($response);

    foreach($matches->items as $book) {
    	echo $book->volumeInfo->title."<br>";
    	
    }


?>
