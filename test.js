/*ANIMACIÓN ÍCONO HAMBURGUESA*/
const navMenu = document.querySelector("#navMenu");
navMenu.addEventListener("click", () => {
    navMenu.classList.toggle("active");
});
/*ANIMACIÓN ACTIVE MENÚ*/
const menufoc = document.querySelector(".menufoc");
menufoc.addEventListener("click", () => {
    menufoc.classList.toggle("active");
});
/*ANIMACIÓN SIDEBAR*/
let btn = document.querySelector("#navMenu");
let sidebar = document.querySelector(".sidebar");

btn.onclick = function() {
    sidebar.classList.toggle("active");
}



/*MOSTRAR / OCULTAR TABLAS MENÚ*/
function mostrarSesion() {
    document.getElementById('idlogSes').style.display = 'block';
    document.getElementById('idlogData').style.display = 'none';
    document.getElementById('title-sesion').style.display='block';
    document.getElementById('title-database').style.display='none';
    document.getElementById('kkk').style.background='var(--secondary-color)';
}

function mostrarData() {
    document.getElementById('idlogData').style.display = 'block';
    document.getElementById('idlogSes').style.display = 'none';
    document.getElementById('title-sesion').style.display='none';
    document.getElementById('title-database').style.display='block';
    document.getElementById('kkk').style.background='var(--primary-color)';
}



/*============ALERTA CERRAR SESIÓN=========*/
function cerrarSesion() {
    alert("Has cerrado sesión");
    location.href = './index.php'
}

/*============ALERTA VALIDAR LOGIN=========*/
function validarLogin() {
    var formulario = document.pruebaVal;
    if (formulario.documento.value == "") {
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Ingresa el documento</div>';
        formulario.documento.focus();
        return false;
    } else {
        document.getElementById("alerta").innerHTML = "";
    }
    if (formulario.password.value == "") {
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Ingresa la contraseña</div>';
        formulario.password.focus();
        return false;
    } else {
        document.getElementById("alerta").innerHTML = "";
    }
    // formulario.submit();
    alert("Has iniciado sesión");
    location.href = './logs.html'
}