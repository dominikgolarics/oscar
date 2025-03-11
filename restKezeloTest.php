<?php
require_once 'restKEzelo.php';

function RestKezeloTeszt(){
    $sr = new RestKezelo();
    $sr->setHttpHeaders(200);

    $responseData = array(
        'status' => 'OK',
        'message' => 'Sikeres válasz',
        'http_status_message' =>$sr->getHttpMessage(200)
        
    );
    echo json_encode($responseData);
}

RestKezeloTeszt();