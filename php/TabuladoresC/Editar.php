<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$id_tbl_tabuladores = $_POST['id_tbl_tabuladores'];
$id_cat_niveles = $_POST['id_cat_niveles']; 
$id_cat_tipo_contratacion = $_POST['id_cat_tipo_contratacion'];
$id_cat_puesto = $_POST['id_cat_puesto'];
$id_cat_zona_tabuladores = $_POST['id_cat_zona_tabuladores'];
$r_sueldo_eve = $_POST['r_sueldo_eve'];
$c_sueldo_eve = $_POST['c_sueldo_eve'];
$r_sueldo = $_POST['r_sueldo'];
$c_sueldo = $_POST['c_sueldo'];
$r_compensa = $_POST['r_compensa'];
$c_compensa = $_POST['c_compensa'];
$r_comp_servicios = $_POST['r_comp_servicios'];
$c_comp_servicios = $_POST['c_comp_servicios'];
$r_polivalencia = $_POST['r_polivalencia'];
$c_polivalencia = $_POST['c_polivalencia'];
$r_asignacion = $_POST['r_asignacion'];
$c_asignacion = $_POST['c_asignacion'];
$r_gastos_actu = $_POST['r_gastos_actu'];
$c_gastos_actu = $_POST['c_gastos_actu'];
$r_beca_medico = $_POST['r_beca_medico'];
$c_beca_medico = $_POST['c_beca_medico'];
$r_complemento_beca = $_POST['r_complemento_beca'];
$c_complemento_beca = $_POST['c_complemento_beca'];
$r_despensa = $_POST['r_despensa'];
$c_despensa = $_POST['c_despensa'];
$r_despensa_mandos = $_POST['r_despensa_mandos'];
$c_despensa_mandos = $_POST['c_despensa_mandos'];
$r_prevision = $_POST['r_prevision'];
$c_prevision = $_POST['c_prevision'];
$r_ayuda_servicios = $_POST['r_ayuda_servicios'];
$c_ayuda_servicios = $_POST['c_ayuda_servicios'];
$fecha_ini = $_POST['fecha_ini'];
$fecha_fin = $_POST['fecha_fin'];

try {
//El array trae la condicion
$arrayCondition = array(
    'id_tbl_tabuladores' => $id_tbl_tabuladores
);

$arrayUpdate = array(
    'id_cat_niveles' => $id_cat_niveles,
    'id_cat_tipo_contratacion' => $id_cat_tipo_contratacion,   
    'id_cat_puesto' => $id_cat_puesto,
    'id_cat_zona_tabuladores' => $id_cat_zona_tabuladores,
    'r_sueldo_eve' => $r_sueldo_eve,
    'c_sueldo_eve' => $c_sueldo_eve,
    'r_sueldo' => $r_sueldo,
    'c_sueldo' => $c_sueldo,
    'r_compensa' => $r_compensa,
    'c_compensa' => $c_compensa,
    'r_comp_servicios' => $r_comp_servicios,
    'c_comp_servicios' => $c_comp_servicios,
    'r_polivalencia' => $r_polivalencia,
    'c_polivalencia' => $c_polivalencia,
    'r_asignacion' => $r_asignacion,
    'c_asignacion' => $c_asignacion,
    'r_gastos_actu' => $r_gastos_actu,
    'r_beca_medico' => $r_beca_medico,
    'c_beca_medico' => $c_beca_medico,
    'r_complemento_beca' => $r_complemento_beca,
    'c_complemento_beca' => $c_complemento_beca,
    'r_despensa' => $r_despensa,
    'c_despensa' => $c_despensa,
    'r_despensa_mandos' => $r_despensa_mandos,
    'c_despensa_mandos' => $c_despensa_mandos,
    'r_prevision' => $r_prevision,
    'c_prevision' => $c_prevision,
    'r_ayuda_servicios' => $r_ayuda_servicios,
    'c_ayuda_servicios' => $c_ayuda_servicios,
    'fecha_ini' => $fecha_ini,
    'fecha_fin' => $fecha_fin
);
$pgs_QRY = pg_update($connectionDBsPro, 'tbl_tabuladores', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/Tabuladores/Listar.php"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}