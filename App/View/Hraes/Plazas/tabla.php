<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/PlazasM/PlazasM.php';

$listado = new modelPlazasHraes();
//$query = $listado->listarByAll(); //INICIO DE LA TABLA CON LA INFORMACION
$busqueda = $_POST['busqueda'];
$paginador = $_POST['paginador'];
$id_tbl_centro_trabajo_hraes = $_POST['id_tbl_centro_trabajo_hraes'];

if ($id_tbl_centro_trabajo_hraes != null){///LISTAR CON ID DE CENTRO DE TRABAJO
    if($busqueda != ''){ ///LISTAR CON BUSQUEDA
        $query = $listado->listarByLike($id_tbl_centro_trabajo_hraes,$busqueda,$paginador);
    } else{ ///LISTAR SIN BUSQUEDA
        $query = $listado->listarByAll($id_tbl_centro_trabajo_hraes,$paginador);
    }
} else { ///LISTAR SIN ID DE CENTRO DE TRABAJO
    if($busqueda != ''){ ///LISTAR CON BUSQUEDA
        $query = $listado->listarByLike($id_tbl_centro_trabajo_hraes,$busqueda,$paginador);
    } else{ ///LISTAR SIN BUSQUEDA
        $query = $listado->listarByAll($id_tbl_centro_trabajo_hraes,$paginador);
    }
}

$data =
    '<table class="table table-striped table-small-rows" id="tabla_plazas" style="width:100%">
    <thead>
        <tr class="table-tittle-color">
            <th class="custom-text-table-tittle col-md-1">Acciones</th>
            <th class="custom-text-table-tittle">N&uacutem. de plaza</th>
            <th class="custom-text-table-tittle">Tipo de plaza</th>
            <th class="custom-text-table-tittle">Tipo de contrataci&oacuten</th>
            <th class="custom-text-table-tittle">Unidad responsable</th>
        </tr>
    </thead>';

if (!$result = pg_query($connectionDBsPro, $query)) {
    exit(pg_result_error($connectionDBsPro));
}
if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_row($result)) {
        $data .=
            '<tbody style="background-color: white;">
                        <tr>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sucess dropdown-toggle table-button-style" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i></button>
                            <div class="dropdown-menu">
                                <button onclick="agregarEditarDetalles(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="fas fa-edit"></i> Modificar</button>
                                <button onclick="detallesEntity(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="fas fa-align-left"></i> Detalles</button>
                                <button onclick="eliminarEntity(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="far fa-trash-alt button-table-on-delete"></i> Eliminar</button>   
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
} else {
    $data .= '<h6>Sin resultados</h6>';
}
echo $data;


