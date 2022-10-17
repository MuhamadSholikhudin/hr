<?php 

function Curl($urlcurl){

    $ch = curl_init($urlcurl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if(curl_exec($ch) === false){
        $val = "false";
    }else{
        $val = "true";
    }
    return $val;
}