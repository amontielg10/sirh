<?php
include("Listar.php");
$idSearch = $_POST['idSearch'];
//$listado = listadoLikeEmp($idSearch);
$listado = listadoLikeEmp($idSearch);

function concatValue($value1, $value2){
    return $value1 .' '. $value2;
}
echo "
<thead>
<tr style='background-color: #5c5c5c; width:100%;'>
    <th style='color: white;'>Menu</th>
    <th style='color: white;'>id</th>
    <th style='color: white;'>id_plaza</th>
    <th style='color: white;'>Empleado</th>
    <th style='color: white;'>CURP</th>
    <th style='color: white;'>RFC</th>
    <th style='color: white;'>Nombre</th>
    <th style='color: white;'>Apellidos</th>
    </tr>
</thead>";

while ($obj = pg_fetch_object($listado)) {
    $apellidos = concatValue($obj->primer_apellido,$obj->segundo_apellido);
    echo "<tr>
    <td><a href='../../index.php' class='btn btn-light' style='background-color: #cb9f52; border:none; outline:none; color: white'>Ir</a></td>
    <td>$obj->id_tbl_empleados</td>
    <td>$obj->id_tbl_control_plazas</td>
    <td>$obj->codigo_empleado</td>
    <td>$obj->curp</td>
    <td>$obj->rfc</td>
    <td>$obj->nombre</td>
    <td>$apellidos</td>
</tr>";
}

/*
if (pg_num_rows($listado) > 0) {
    $result = "con resultado";
} else {
    $result = "sin datos";
}

*/