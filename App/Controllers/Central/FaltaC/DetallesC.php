<?php
include '../librerias.php';

$id_falta = $_POST['id_object'];
$faltaModelM = new FaltaModelM();
$row = new row();

if ($id_falta != null) {
    $response = $row->returnArray($faltaModelM->listarEditById($id_falta));


    
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);

} else {
    $response = $faltaModelM->listarByNull();
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);
}
