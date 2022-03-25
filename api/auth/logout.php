<?php
    
    if($_SERVER['REQUEST_METHOD'] == "POST") {

        session_start();
        session_destroy();
       
        http_response_code(200);
    }
    else {
        http_response_code(405);
    }
?>