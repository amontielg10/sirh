<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

     //La variable contiene el listado
     function listadoEmpleados($id){
          include('../../conexion.php'); //Se incluye la conexion
          $listado = pg_query($connectionDBsPro, "SELECT * FROM tbl_empleados WHERE id_tbl_control_plazas = '$id'"); 
          return $listado;
     }
  
     //La funcion retorna los atributos dependiendo del id que se ingrese como parametro
     function catEmpleadosId($id){
          $catSQL = pg_query("SELECT * FROM tbl_empleados WHERE id_tbl_empleados = '$id' ");
          $row = pg_fetch_array($catSQL);
          return $row;
     }
