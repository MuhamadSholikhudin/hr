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

function Url_website(){
    $url = "http://127.0.0.1:8000";
    return $url;
}

function Url_api(){
    $url_api = "http://127.0.0.1:8880";
    return $url_api;
}