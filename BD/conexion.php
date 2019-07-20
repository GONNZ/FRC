<?php

$hostname = "localhost";
$database = "bdfrc";
$userdb = "root";
$password = "";


$mysql = new mysqli($hostname,$userdb,$password,$database);

if($mysql->connect_errno){
    $error_bd = "Falló la conexión";
}else {
    $error_bd = false;
}