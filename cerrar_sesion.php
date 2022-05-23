<?php
//CONEXIÓN A LA BASE DE DATOS
include_once("conexion.php");
session_start();
// Si la sesión actual se destruye 
if (session_destroy()){
    $query=pg_query("INSERT INTO log_sesion (nombre_sesion,ccus,fecha) VALUES ('Cerró Sesión',$_SESSION[Num_doc],current_date)");
    header("location:index.php");
    // Destruye toda la información asociada con la sesión actual
    session_unset();
}
?>