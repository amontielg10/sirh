<?php
include '../librerias.php';

$id_objectDependiente = $_POST['id_object'];
$modelRetardoM = new ModelRetardoM();
$catRetardosM = new CatRetardosM();
$catSelectC = new CatSelectC();
$row = new row();

$quincena = 'Quincena';
$periodoQuincena = 'Periodo de quincena';

if ($id_objectDependiente != null) {
    $response = $row->returnArray($modelRetardoM->listarEditById($id_objectDependiente));
    
    $var = [
        'response' => $response,
        'catRetardoTipo' => $catRetardoTipo,
        'catRetardoEstatus' => $catRetardoEstatus,
        'quincena' => $quincena,
        'periodoQuincena' => $periodoQuincena,
    ];
    echo json_encode($var);

} else {
    $response = $modelRetardoM->listarByNull();
    $catRetardoTipo = $catSelectC->selectByAllCatalogo($catRetardosM->listadoRetardoTipo());
    $catRetardoEstatus = $catSelectC->selectByAllCatalogo($catRetardosM->listadoRetardoEstatus());
    
    $var = [
        'response' => $response,
        'catRetardoTipo' => $catRetardoTipo,
        'catRetardoEstatus' => $catRetardoEstatus,
        'quincena' => $quincena,
        'periodoQuincena' => $periodoQuincena,
    ];
    echo json_encode($var);
}
