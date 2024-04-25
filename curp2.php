<?php
if(isset($_COOKIE["miCookie"])) {
    $valor = $_COOKIE["miCookie"];
    echo $valor;
} else {
    echo "Cookie no encontrada";
}
?>