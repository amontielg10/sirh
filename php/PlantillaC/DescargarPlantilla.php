<?php

/**
 * CATALOGO DE DESCARGAS DE PLANTILLAS
 * ID   NOMBRE                    RUTA
 * 1    'ModuloJuguetes.xlsx'     '../../assets/documents/template/ModuloJuguetes.xlsx'
 * 2
 */

$id_cat_plantilla = $_POST['id_cat_plantilla'];

switch ($id_cat_plantilla) {
    case '1':
        descargarPlantilla('../../assets/documents/template/ModuloJuguetes.xlsx','ModuloJuguetes.xlsx');
        break;
    case '2':
        echo "2";
        break;
}

function descargarPlantilla($rutaArchivo, $nombreArchivo)
{
    if (file_exists($rutaArchivo)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $nombreArchivo . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($rutaArchivo));
        readfile($rutaArchivo);
        exit;
    }
}

