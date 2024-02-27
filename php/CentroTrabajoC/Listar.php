<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

     //La variable contiene el listado
    $listado = pg_query($connectionDBsPro, "SELECT * FROM tbl_centro_trabajo ORDER BY id_tbl_centro_trabajo DESC"); 
  
     //La funcion retorna los atributos dependiendo del id que se ingrese como parametro
     function catcentroTrabajo($id){
          $catSQL = pg_query("SELECT * FROM tbl_centro_trabajo WHERE id_tbl_centro_trabajo = '$id' ");
          $row = pg_fetch_array($catSQL);
          return $row;
     }


     function catcentroTrabajoPk($id){
          if ($id != null){
          $catSQL = pg_query("SELECT * FROM tbl_centro_trabajo WHERE id_tbl_centro_trabajo = '$id' ");
          $row = pg_fetch_array($catSQL);
          $res = $row["clave_centro_trabajo"];
          return $res;
          }
          else {
               return "";
          }
     }
