<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/EmpleadosM/EmpleadosM.php';
include '../../../Model/Hraes/CamposPersM/CamposPersM.php';

$model = new modelEmpleadosHraes();
$modelCampPer = new modelCamposPersHraes();

$condicion = [
    'id_tbl_empleados_hraes' => $_POST['id_object']
];

$datos = [
    'nombre' => $_POST['nombre'],
    'rfc' => $_POST['rfc'],
    'primer_apellido' => $_POST['primer_apellido'],
    'curp' => $_POST['curp'],
    'segundo_apellido' => $_POST['segundo_apellido'],
    'nss' => $_POST['nss'],
];


$datosPerson = [
    'porcentaje_ahorro_s' => $_POST['porcentaje_ahorro_s'],
    'dias_medio_sueldo' => $_POST['dias_medio_sueldo'],
    'dias_sin_sueldo' => $_POST['dias_sin_sueldo'],
    'reintegro_faltas_retardos' => $_POST['reintegro_faltas_retardos'],
    'importe_festivo' => $_POST['importe_festivo'],
    'importe_horas_ex' => $_POST['importe_horas_ex'],
    'importe_prima_dominical' => $_POST['importe_prima_dominical'],
    'importe_descuentos_indebidos' => $_POST['importe_descuentos_indebidos'],
    'regimen_pen' => $_POST['regimen_pen'],
    'quinquenio' => $_POST['quinquenio'],
    'num_hijos' => $_POST['num_hijos'],
    'aplicar_juguetes' => $_POST['aplicar_juguetes'],
    'apoyo_titulacion' => $_POST['apoyo_titulacion'],
    'licencia_manejo' => $_POST['licencia_manejo'],
    'importe_recuperacion_pagos_indebidos' => $_POST['importe_recuperacion_pagos_indebidos'],
    'num_dias_jornada_dominical' => $_POST['num_dias_jornada_dominical'],
    'num_dias_guardia_festiva' => $_POST['num_dias_guardia_festiva'],
    'porcentaje_svi' => $_POST['porcentaje_svi'],
    'dias_sansion_adma' => $_POST['dias_sansion_adma'],
];

if($_POST['id_object'] != null){ //Modificar
    if($model -> editarByArray($connectionDBsPro,$datos, $condicion)){
        if ($modelCampPer -> editarByArray($connectionDBsPro,$datosPerson,$condicion)){
            echo 'edit';
        }
    } 

} else { //Agregar
    if($model -> agregarByArray($connectionDBsPro,$datos)){
        echo 'add';
    } 
}


