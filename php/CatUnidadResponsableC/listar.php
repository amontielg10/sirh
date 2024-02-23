<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

     //La variable contiene el listado del catalogo de estatus
    $listadoUR = pg_query($connectionDBsPro, "SELECT * FROM cat_unidad_responsable ORDER BY codigo ASC"); 
  
//La funcion retorna solo el estatus
function catPk($id){
    $catSQL = pg_query("SELECT * FROM cat_unidad_responsable WHERE id_cat_unidad_responsable = '$id' ");
    $row = pg_fetch_array($catSQL);
    $res = $row["codigo"].' - '.$row['nombre'];
    return $res;
}
