<?php
    //Reanudamos la sesion abierta
    session_start();
    //Cerramos la sesion abierta
    session_destroy();
    //Redirigimos al usuario a la pagina del Login
    header("location:Login3.html");
?>