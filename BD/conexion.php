<?php

$hostname = "localhost";
$database = "bdfrc";
$userdb = "root";
$password = "";


$mysql = new mysqli($hostname,$userdb,$password,$database);
$mysql->set_charset('utf8');

if($mysql->connect_errno){
    $error_bd = "Falló la conexión";
}else {
    $error_bd = false;
}