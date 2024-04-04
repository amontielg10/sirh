<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoEmpleados($id)
{
     include('../../conexion.php'); //Se incluye la conexion
     $listado = pg_query("SELECT tbl_empleados.id_tbl_empleados, tbl_empleados.fecha_ingreso, 
                                 tbl_empleados.rfc, tbl_empleados.curp, tbl_empleados.nombre,
                                 tbl_empleados.primer_apellido, tbl_empleados.segundo_apellido, 
                                 tbl_empleados.nss, tbl_empleados.fecha_baja,
                                 tbl_empleados.id_cat_estatus, tbl_plazas_empleados.id_tbl_empleados,
                                 tbl_plazas_empleados.id_tbl_control_plazas   
                         FROM tbl_empleados 
                         INNER JOIN tbl_plazas_empleados    
                         ON tbl_empleados.id_tbl_empleados = tbl_plazas_empleados .id_tbl_empleados
                         WHERE tbl_plazas_empleados .id_tbl_control_plazas = $id");
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
          $listado = pg_query("SELECT nombre, primer_apellido, segundo_apellido 
                               FROM tbl_empleados AS emp 
                               INNER JOIN tbl_plazas_empleados AS pe   
                               ON emp.id_tbl_empleados = pe.id_tbl_empleados
                               WHERE pe.id_tbl_control_plazas = $id_tbl_control_plaza");
          $row = pg_fetch_array($listado);
          $res = $row['nombre'] . ' ' . $row['primer_apellido'] .' ' . $row['segundo_apellido'];
          return $res;
          } else {
               return '';
          }
}

function rfcEmpleado($id_tbl_control_plaza)
{
     if ($id_tbl_control_plaza != null){
          $listado = pg_query("SELECT rfc
                               FROM tbl_empleados AS emp 
                               INNER JOIN tbl_plazas_empleados AS pe   
                               ON emp.id_tbl_empleados = pe.id_tbl_empleados
                               WHERE pe.id_tbl_control_plazas = $id_tbl_control_plaza");
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
     $listado = pg_query("SELECT curp 
                          FROM tbl_empleados AS emp 
                          INNER JOIN tbl_plazas_empleados AS pe   
                          ON emp.id_tbl_empleados = pe.id_tbl_empleados
                          WHERE pe.id_tbl_control_plazas = $id_tbl_control_plaza");
     $row = pg_fetch_array($listado);
     $res = $row['curp'];
     return $res;
     } else {
          return '';
     }
}
