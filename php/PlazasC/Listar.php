<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

     //La variable contiene el listado
     function listado(){
          include('../../conexion.php'); //Se incluye la conexion
          $listado = pg_query($connectionDBsPro, "SELECT * FROM tbl_control_plazas ORDER BY id_tbl_control_plazas DESC LIMIT 100"); 
          return $listado;
     }
  
     //La funcion retorna los atributos dependiendo del id que se ingrese como parametro
     function catControlPlazasPk($id){
          $catSQL = pg_query("SELECT * FROM tbl_control_plazas WHERE id_tbl_control_plazas = '$id' ");
          $row = pg_fetch_array($catSQL);
          return $row;
     }
