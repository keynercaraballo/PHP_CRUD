<?php
//conectar a mysql 
$con = mysqli_connect("localhost", "root","","php_crud");

//probar conexion 
if(mysqli_connect_errno()){
    echo "Fallo al conectarse a mysql" .mysqli_connect_error();
}