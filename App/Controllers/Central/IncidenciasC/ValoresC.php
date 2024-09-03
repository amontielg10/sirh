<?php

include '../librerias.php';

$catDiasM = new CatDiasM();
$row = new row();


$fechaInicio = $_POST['fecha_inicio_ins'];
$fechaFin = $_POST['fecha_fin_ins'];
$idEmpleado = $_POST['id_tbl_empleados_hraes'];

$periodo = 'SIN RESULTADO';
$diasSeleccionados = 'SIN RESULTADO';

//Se obtiene el periodo
if ($fechaInicio != '') {
    if (pg_num_rows($catDiasM->getPeriodo($fechaInicio)) > 0) {
        $periodo = $row->returnArrayById($catDiasM->getPeriodo($fechaInicio));
        $periodo = $periodo[0];
    }
}

// calculo de dias seleccionados
if($fechaInicio != '' && $fechaFin == ''){//funion de un solo dia
    $diasSeleccionados = 1; //uno perteneciendo a solo un dia que se selecciono
} else if ($fechaInicio != '' && $fechaFin != ''){ //funcion donde se selecciona un rango de fechas

}



$var = [
    'periodo' => $periodo,
    'diasSeleccionados' => $diasSeleccionados = $diasSeleccionados > 1 ? $diasSeleccionados + ' Dias' : $diasSeleccionados + ' Dia',
];
echo json_encode($var);
