<?php
// class Conexion{
//     public static function conexionDB(){
        $dbconnect = "host=localhost dbname=login user=postgres password=Juanquitapro123!";
        $conexion = pg_connect($dbconnect) or die("Error de conexion". pg_last_error());
?>