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
    $url = "http://10.10.42.6:8001";
    return $url;
}

function Url_api(){
    $url_api = "http://10.10.42.6:8880";
    return $url_api;
}