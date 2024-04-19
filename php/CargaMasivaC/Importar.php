<?php

include '../ControlJuguetesC/PagoJuguetes.php';

$id_cat_carga_masiva = $_POST['id_cat_carga_masiva'];
$id_cat_fecha_juguetes_new = $_POST['id_cat_fecha_juguetes'];
$file = $_POST['archivo'];

switch ($id_cat_carga_masiva) {
    case '1':
        echo "1";
        break;
    case '2':
        pagoJuguetes($file,$id_cat_fecha_juguetes_new);
        break;

}

