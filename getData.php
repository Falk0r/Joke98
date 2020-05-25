<?php

function getJoke()
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, "https://blague.xyz/api/joke/random");
    
    $headers = array(
        'Accept: application/json',
        'Content-type: application/json',
        'Authorization: h35QKcW_X_hhfHOk5oSKjPrcujGAykQbOyNGyKuF1P5fWZ.iBb0A_o-I3coCmti9',
    );
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($curl);
    
    $data = (json_decode($result, true)['joke']);
    
    curl_close($curl);
    return $data;
};

$data = getJoke();