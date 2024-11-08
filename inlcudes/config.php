<?php

if(session_id() == false){
    session_start();
}

$conn = new  mysqli("localhost","root","","db_sms");
if ($conn->connect_error) {
    printf("Connection Error: ", mysqli_connect_error());
    exit();
}

if( !function_exists('url')){
    function url($path = null) {
        return "http://localhost/see/". $path;
    }
}


