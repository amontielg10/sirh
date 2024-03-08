<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoEmpleados($id)
{
     include('../../conexion.php'); //Se incluye la conexion
     $listado = pg_query($connectionDBsPro, "SELECT * FROM tbl_empleados WHERE id_tbl_control_plazas = '$id'");
     return $listado;
}

function listadoLikeEmp($like)
{
     $listado = pg_query("SELECT * FROM tbl_empleados WHERE codigo_empleado LIKE '%$like%' OR curp LIKE '%$like%' OR rfc LIKE '%$like%'");
     return $listado;
}

//La funcion retorna los atributos dependiendo del id que se ingrese como parametro
function catEmpleadosId($id)
{
     $catSQL = pg_query("SELECT * FROM tbl_empleados WHERE id_tbl_empleados = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}

function nombreEmpleado($id_tbl_control_plaza)
{
     if ($id_tbl_control_plaza != null){
     $listado = pg_query("SELECT nombre,primer_apellido, segundo_apellido FROM tbl_empleados WHERE id_tbl_control_plazas = '$id_tbl_control_plaza' LIMIT 1");
     $row = pg_fetch_array($listado);
     $res = $row['nombre'].' '.$row['primer_apellido'].' '.$row['segundo_apellido'];
     return $res;
     } else {
          return '';
     }
}

function rfcEmpleado($id_tbl_control_plaza)
{
     if ($id_tbl_control_plaza != null){
     $listado = pg_query("SELECT rfc FROM tbl_empleados WHERE id_tbl_control_plazas = '$id_tbl_control_plaza' LIMIT 1");
     $row = pg_fetch_array($listado);
     $res = $row['rfc'];
     return $res;
     } else {
          return '';
     }
}

function codigoEmpleado($id_tbl_control_plaza)
{
     if ($id_tbl_control_plaza != null){
     $listado = pg_query("SELECT codigo_empleado FROM tbl_empleados WHERE id_tbl_control_plazas = '$id_tbl_control_plaza' LIMIT 1");
     $row = pg_fetch_array($listado);
     $res = $row['codigo_empleado'];
     return $res;
     } else {
          return '';
     }
}
