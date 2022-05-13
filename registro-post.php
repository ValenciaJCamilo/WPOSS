<?php
    //CONEXIÓN A LA BASE DE DATOS
    include_once("conexion.php");

    //VARIABLES 
    $documento = $_POST["documento"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];

    //FUNCIÓN PARA VALIDAR CAMPOS VACÍOS
    function validate($documento,$firstname,$lastname,$email,$username,$password,$repassword,$formbtn){
        return !empty($documento) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($username) && !empty($password) && !empty($repassword);
    }

    //VARIABLE NECESARIA PARA SABER EL ESTADO DE LOS CAMPOS Y ASÍ LA ALERTA
    $status="";


    //Toma todos los datos dentro del array y los posiciona en las variables
    if(validate(...$_POST)){
        $result = pg_query("INSERT INTO personas VALUES($documento,'$firstname','$lastname','$email')");
        $result = pg_query("INSERT INTO usuarios VALUES($documento,'$username','$password')");
        $status = "Success";
        echo "Registro completado";
    }else{
        $status = "Danger";
        echo "Ups, debes completar todos los campos";
    }

// header("location:registro.php");

?>