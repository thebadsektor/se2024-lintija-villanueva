<?php

    $database= new mysqli("localhost","root","123456789","edoc");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>