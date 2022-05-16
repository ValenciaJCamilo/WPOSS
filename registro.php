<?php
//CONEXIÓN A LA BASE DE DATOS
include_once("conexion.php");
//FUNCIÓN PARA VALIDAR CAMPOS VACÍOS
function validate($documento,$firstname,$lastname,$email,$username,$password,$repassword,$formbtn)
{
    return !empty($documento) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($username) && !empty($password) && !empty($repassword);
}
//VARIABLE NECESARIA PARA SABER EL ESTADO DE LOS CAMPOS Y ASÍ LA ALERTA
$status="";

if (isset($_POST["formbtn"]) ) {    

    if(validate(...$_POST)){        
        //VARIABLES 
        $documento = $_POST["documento"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];

        $cantidadRegistro;
        // SABER SI EL REGISTRO SE ENCUENTRA EN LA BASE DE DATOS
        $query = "SELECT cc FROM personas WHERE cc = '$documento';";
        $consulta = pg_query($query);
        if($consulta){
            $cantidadRegistro = pg_num_rows($consulta);
        }

        if($cantidadRegistro == 0){
            try {
                //Toma todos los datos dentro del array y los posiciona en las variables
                $result = pg_query("INSERT INTO personas VALUES($documento,'$firstname','$lastname','$email')");
                $result = pg_query("INSERT INTO usuarios VALUES($documento,'$username','$password')");
            } catch (Exception $e) {
                echo "<center>Registro fallido</center>";
            }
            if($result){
                if($password==$repassword){
                    $status = "Success";
                    echo "<center>Registro exitoso</center>";
                }
                else{
                    echo "<center>Las contraseñas no coinciden</center>";
                }
            }else{
                $status = "Danger";
                echo "<script>";
                echo "alert('Registro fallido');";
                echo "</script>";
                header("location:registro.php");
            }
        }else{
            echo "<center>Ups, el usuario se encuentra registrado</center>";
        }

    }else{
        echo "<center>Debes completar todos los campos</center>";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/icon.png">
    <!--=============== SEO TAGS ===============-->
    <meta name="description" content="Hey, este es un ejercicio práctico de vistas en HTML y CSS realizado para poder imgresar a la empresa WPOSS :). Esta es la vista de Registro">
    <meta name="keywords" content="Web Developer, Web Development, WPOSS, HTML,CSS,HTML5,CSS3,JavaScript, Jquery, Frontend Development, UI, UX, Web, Web design">
    <meta name="author" content="Camilo Valencia">
    <meta name="copyright" content="Camilo Valencia" />
    <meta name="robots" content="follow" />
    <!--=============== GOOGLE FONTS ===============-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="./assets/styles/sesion.css">
    <!--=============== ICON ===============-->
    <link rel="icon" href="https://icons.iconarchive.com/icons/pelfusion/flat-file-type/512/log-icon.png">
    <title>Registro</title>
</head>

<body>
    <!--Esto es todo la vista general del registro-->
    <div class="signup">
        <!--Esta es la sección del icono-->
        <div class="form-container">
            <i class='bx bxs-user usericon'></i>
            <form action="registro.php" method="post" class="form" name="form">
                <!--Campo del documento-->
                <div class="signup__form-div">
                    <input id="documento" type="number"  name="documento" placeholder=" " title="Número de documento de identidad" class="signup__form-input">
                    <label for="documento" class="signup__form-tag">Documento</label>
                </div>
                <!--Campo de texto del nombre-->
                <div class="signup__form-div">
                    <input id="firstname" type="text" autocomplete  name="firstname" placeholder=" " title="Nombres" class="signup__form-input">
                    <label for="firstname" class="signup__form-tag">Nombres</label>
                </div>
                <!--Campo de texto del apellido-->
                <div class="signup__form-div">
                    <input id="lastname" type="text" autocomplete  name="lastname" placeholder=" " title="Apellidos" class="signup__form-input">
                    <label for="lastname" class="signup__form-tag">Apellidos</label>
                </div>
                <!--Campo de texto del email-->
                <div class="signup__form-div">
                    <input id="email" type="email" autocomplete  name="email" placeholder=" " title="Correo electrónico " class="signup__form-input">
                    <label for="email" class="signup__form-tag">Correo electrónico</label>
                </div>
                <!--Campo de texto del usuario-->
                <div class="signup__form-div">
                    <input id="username" type="text" autocomplete  name="username" placeholder=" " title="Nombre de usuario/Nickname" class="signup__form-input">
                    <label for="username" class="signup__form-tag">Usuario</label>
                </div>
                <!--Campo de contraseña-->
                <div class="signup__form-div">
                    <input id="password" type="password" autocomplete  name="password" placeholder=" " title="Contraseña" class="signup__form-input">
                    <label for="password" class="signup__form-tag">Contraseña</label>
                </div>
                <!--Campo de confirmar contraseña-->
                <div class="signup__form-div">
                    <input id="repassword" type="password" autocomplete  name="repassword" placeholder=" " title="Confirmar contraseña" class="signup__form-input">
                    <label for="repassword" class="signup__form-tag">Confirmar contraseña</label>
                </div>
                <button name="formbtn" class="primary-button-signup" type="submit">Registrarse</button>
            </form>
            <!--Ancla. Login-->
            <div class="alternative ">
                <a href="./index.php " title="Iniciar sesión " class="form-a-signup ">
                    <i class='bx bx-check checkicon'></i> Iniciar Sesión
                    <a>
            </div>
        </div>
    </div>
</body>
<!-- <script src="test.js "></script> -->
</html>