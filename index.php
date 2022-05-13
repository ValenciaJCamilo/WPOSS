<!--CONEXIÓN BASE DE DATOS-->
<?php
    include_once("./conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/icon.png">
    <!--=============== SEO TAGS ===============-->
    <meta name="description" content="Hey, este es un ejercicio práctico de vistas en HTML y CSS realizado para poder imgresar a la empresa WPOSS :). Esta es la vista de Login">
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
    <title>Login</title>
</head>

<body>
    <!--Esto es la la vista general del login-->
    <div class="login">
        <!--Esta es la sección del icono-->
        <div class="form-container">
            <i class='bx bxs-user usericon'></i>
            <form action="/" method="post" class="form" id="formLogin" name="pruebaVal">
                <!--Mensaje de alerta :p-->
                <div id="alerta"></div>

                <!--Campo del documento-->
                <div class="login__form-div" id="grupo-documento">
                    <input id="documento" type="number" autocomplete name="documento" placeholder=" " title="Número de documento de identidad" class="login__form-input">
                    <label for="documento" class="login__form-tag">Documento</label>
                </div>
                <!--Campo de contraseña-->
                <div class="login__form-div">
                    <input id="password" type="password" autocomplete name="password" placeholder=" " title="Contraseña" class="login__form-input">
                    <label for="password" class="login__form-tag">Contraseña</label>
                </div>
                <button class="primary-button-login" type="button" onclick="validarLogin();">Iniciar Sesión</button>
            </form>
            <!--Ancla. Registro-->
            <div class="alternative ">
                <a href="./registro.php " title="Registrarse " class="form-a-login ">
                    <i class='bx bx-check checkicon'></i> Registrarse
                    <a>
            </div>
        </div>
    </div>
</body>
<script src="test.js "></script>

</html>