<?php
    session_start();

    unset($_SESSION['id']);
    unset($_SESSION['nombre']);
    unset($_SESSION['app']);
    unset($_SESSION['apm']);
    unset($_SESSION['correo']);

    session_destroy();

    header(("location: authentication-login.php"));

?>