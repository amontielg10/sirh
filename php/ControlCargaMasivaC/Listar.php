<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function agregarControlCargaMasiva($tipo_carga,$id_usuario,$connectionDBsPro){
     $now = 'NOW()';
     $insert = pg_insert($connectionDBsPro, 'ctrl_carga_masiva', array(
         'id_usuario' => $id_usuario,
         'tipo_carga' => $tipo_carga,  
         'fecha' => $now,
     ));
 }

 function listarControlCargaMasivaByMax()
{
     $list = pg_query("SELECT MAX(id_ctrl_carga_masiva) 
                         FROM ctrl_carga_masiva");
     $row = pg_fetch_array($list);
     $res = $row[0];
     return $res;
}