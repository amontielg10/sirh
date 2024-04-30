<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/PlazasM/PlazasM.php';

$model = new modelPlazasHraes();

$condicion = [
    'id_tbl_control_plazas_hraes' => $_POST['id_object']
];

$datos = [
    'id_cat_plazas' => $_POST['id_cat_plazas'],
    'id_cat_tipo_contratacion_hraes' => $_POST['id_cat_tipo_contratacion_hraes'],
    'id_cat_unidad_responsable' => $_POST['id_cat_unidad_responsable'],
    'id_cat_puesto_hraes' => $_POST['id_cat_puesto_hraes'],
    'id_cat_zonas_tabuladores_hraes' => $_POST['id_cat_zonas_tabuladores_hraes'],
    'id_cat_niveles_hraes' => $_POST['id_cat_niveles_hraes'],
    'zona_pagadora' => $_POST['zona_pagadora'],
    'num_plaza' => $_POST['num_plaza'],
    'fecha_ingreso_inst' => $_POST['fecha_ingreso_inst'],
    'fecha_inicio_movimiento' => $_POST['fecha_inicio_movimiento'],
    'fecha_termino_movimiento' => $_POST['fecha_termino_movimiento'],
    'fecha_modificacion' => $_POST['fecha_modificacion'],
    'id_tbl_centro_trabajo_hraes' => $_POST['id_tbl_centro_trabajo_hraes'],
];

if ($_POST['id_object'] != null) { //Modificar
    if ($model->editarByArray($connectionDBsPro, $datos, $condicion)) {
        echo 'edit';
    }

} else { //Agregar
    if ($model->agregarByArray($connectionDBsPro, $datos)) {
        echo 'add';
    }
}


