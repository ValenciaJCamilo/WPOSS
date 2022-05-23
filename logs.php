<?php
//CONEXIÓN A LA BASE DE DATOS
include_once("conexion.php");
session_start();

$varsesion = $_SESSION;

// Si se intenta ingresar a logs.php a la fuerza sin estar iniciada la sesión
if($varsesion == null || $varsesion =''){
    echo "<script>
    alert('Hmm... algo salió mal. Por favor inicia sesión');
    window.location= 'index.php'
    </script>";
    //Función que finaliza la ejecución del script actual     
    die();
}else{
    // Si se está en la sesión, se hace la consulta para mostrar usuario y nombre
    $idUser = $_SESSION['Num_doc'];
    $query="SELECT usuario FROM usuarios WHERE cc='$idUser'";
    $consulta=pg_query($query);
    $result = pg_fetch_row($consulta);
    $query1="SELECT nombre,apellido FROM personas WHERE cc='$idUser'";
    $consulta1=pg_query($query1);
    $result1 = pg_fetch_row($consulta1);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/icon.png">
    <!--=============== SEO TAGS ===============-->
    <meta name="description" content="Hey, este es un ejercicio práctico de vistas en HTML y CSS realizado para poder imgresar a la empresa WPOSS :). Esta es la vista del dashboard">
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
    <link rel="stylesheet" href="./assets/styles/logs.css">
    <!--=============== ICON ===============-->
    <link rel="icon" href="https://icons.iconarchive.com/icons/pelfusion/flat-file-type/512/log-icon.png">
    <title>Logs</title>
</head>

<body>
    <div class="sidebar">
        <div class="user__information">
            <div class="user__logo">
                <i class='bx bx-user-circle userlogo'></i>
                <div class="user_inf">
                    <div class="user__username">
                        <span>Usuario:⠀</span>
                        <!--Imprimo la posición 0 de la consulta, o sea el usuario-->
                        <?php echo($result[0]);?>
                    </div>
                    <div class="user__fullname">
                        <span>Nombre:⠀</span>
                        <!--Imprimo la posición 0 de la consulta que es nombre -->                        
                        <?php echo($result1[0]);?>
                        <!--Imprimo la posición 1 de la consulta que es nombre -->                        
                        <?php echo($result1[1]);?>
                    </div>
                </div>
            </div>
            <div id="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <ul class="nav__list">
            <li>
                <a href="#" class="menufoc active" id="kkk" onclick="mostrarSesion();">
                    <i class='bx bx-intersect'></i>
                    <span class=" links__name">Log Sesión</span>
                </a>
                <span class="tooltip ">Log Sesión</span>
            </li>
            <li>
                <a href="#" class="menufoc active" onclick="mostrarData();">
                    <i class='bx bx-data'></i>
                    <span class=" links__name ">Log Database</span>
                </a>
                <span class="tooltip ">Log Database</span>
            </li>
            <li>
                <a href="./cerrar_sesion.php" class="menufoc active" name="cerrarSesion">
                    <i class='bx bx-log-out'></i>
                    <span class="links__name ">Cerrar sesión</span>
                </a>
                <span class="tooltip">Cerrar sesión</span>
            </li>
        </ul>
    </div>
    <div class="header__cont ">
        <header class="header ">
            <h1>Aplicación Login</h1>
        </header>
    </div>
    <div class="header__cont jeje">
    </div>
    <main>
        <div class="test">
            <h2 class="table-title" id="title-sesion">Log Sesion</h2>
            <div class="container-table " id="idlogSes">
                <table class=" tableSesion">
                    <!-- <caption>Log Sesión</caption> -->
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Cédula</th>
                            <th>Nombre Sesión</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query="SELECT * FROM log_sesion";
                        $consulta=pg_query($query);
                        while($obj=pg_fetch_row($consulta)){ ?>                        
                        <tr>
                            <td data-label="Id"><?php echo $obj[0];?></td>
                            <td data-label="Cédula "><?php echo $obj[2];?></td>
                            <td data-label="Nombre Sesión "><?php echo $obj[1];?></td>
                            <td data-label="Fecha "><?php echo $obj[3];?></td>
                        </tr>
                    </tbody>
                    <?php
                            }
                        ?>
                </table>
            </div>
        </div>
<div>

    <h2 class="table-title tbl-logdb" id="title-database">Log Database</h2>
        <!-- <div class="container-table-database " id="idlogData "> -->
            <div class="container-table-database" id="idlogData">
                <table class="tableSesion">
                    <!-- <caption>Log Database</caption> -->
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tabla</th>
                            <th>Acción</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query="SELECT * FROM log_database";
                        $consulta=pg_query($query);
                        while($obj=pg_fetch_row($consulta)){ ?>
                            <tr>
                                <td data-label="Id"><?php echo $obj[0];?></td>
                                <td data-label="Tabla"><?php echo  $obj[1];?></td>
                                <td data-label="Acción"><?php echo $obj[2];?></td>
                                <td data-label="Descripción"><?php echo $obj[4];?></td>
                                <td data-label="Fecha"><?php echo $obj[3];?></td>
                            </tr>
                    </tbody>
                        <?php
                            }
                        ?>
                </table>
            </div>
</div>

    </main>
    <script src="test.js "></script>
</body>

</html>