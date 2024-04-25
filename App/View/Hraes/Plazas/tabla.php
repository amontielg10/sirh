<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/PlazasM/PlazasM.php';

$listado = new modelPlazasHraes();

$query = $listado->listarByAll(); //INICIO DE LA TABLA CON LA INFORMACION

if (isset($_POST['busqueda'])) { /// INICIO DE LA TABLA SI SE INGRESA UNA BUSQUEDA
    if (isset($_POST['id_object']) != 'ok') {
        $busqueda = $_POST['busqueda'];
        $id_object = $_POST['id_object'];
        $query = $listado->listarByLikeByIdCentroTrabajo($busqueda, $id_object);
    } else {
        $busqueda = $_POST['busqueda'];
        $query = $listado->listarByLike($busqueda);
    }
} else if (isset($_POST['id_object'])) { //INICIO DE LA TABLA CON EL ID DEL CENTRO DE TRABAJO SELECCIONADO
    $id_object = $_POST['id_object'];
    $query = $listado->listarByAllByIdCentroTrabajo($id_object);///INICIO DE LA TABLA SI SE INGRESA UNA BUSQUEDA CON EL CENTRO DE TRABAJO SELECCIONADO
} 

$data =
    '<table class="table table-striped" id="t-table" style="width:100%">
    <thead>
        <tr style="background-color:#235B4E;">
            <th style="color: white; width: 50px">Acciones</th>
            <th style="color: white;">N&uacutem. de plaza</th>
            <th style="color: white;">Tipo de plaza</th>
            <th style="color: white;">Tipo de contrataci&oacuten</th>
            <th style="color: white;">Unidad responsable</th>
        </tr>
    </thead>';

if (!$result = pg_query($connectionDBsPro, $query)) {
    exit(pg_result_error($connectionDBsPro));
}
if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_row($result)) {
        $data .=
            '<tbody>
                        <tr>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i></button>
                            <div class="dropdown-menu">
                                <button onclick="agregarEditarDetalles(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="fas fa-edit"></i> Modificar</button>
                                <button onclick="detallesEntity(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="fas fa-align-left"></i> Detalles</button>
                                <button onclick="agregarEditarDetalles(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="fas fa-user-alt"></i> Empleado</button>
                                <button onclick="eliminarEntity(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="far fa-trash-alt"></i> Eliminar</button>   
                            </div>
                          </div>
                                </td>
                            <td>
                                ' . $row[1] . '
                            </td>
                            <td>
                                ' . $row[2] . '
                            </td>
                            <td>
                                ' . $row[3] . '
                            </td>
                            <td>
                                ' . $row[4] . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
}

echo $data;


