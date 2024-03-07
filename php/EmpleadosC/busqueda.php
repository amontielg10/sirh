<?php
include("Listar.php");
$idSearch = $_POST['idSearch'];
//$listado = listadoLikeEmp($idSearch);
$listado = listadoLikeEmp($idSearch);

echo "<thead>
<tr>
    <th>id</th>
    <th>id_plaza</th>
    <th>Codigo empleado</th>
    <th>CURP</th>
    <th>RFC</th>
    <th>Nombre</th>
    <th>Apellido Paterno</th>
    <th>Apellido Materno</th>
    </tr>
</thead>";

while ($obj = pg_fetch_object($listado)) {
    echo "<tr>
    <td>$obj->id_tbl_empleados</td>
    <td>$obj->id_tbl_control_plazas</td>
    <td>$obj->codigo_empleado</td>
    <td>$obj->curp</td>
    <td>$obj->rfc</td>
    <td>$obj->nombre</td>
    <td>$obj->primer_apellido</td>
    <td>$obj->segundo_apellido</td>
</tr>";
}

/*
if (pg_num_rows($listado) > 0) {
    $result = "con resultado";
} else {
    $result = "sin datos";
}

*/