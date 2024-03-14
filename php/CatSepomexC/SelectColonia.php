<?php

include('../CatSepomexC/listar.php');
$d_mnpio = $_POST['d_mnpio'];

$listado = listarCatSepmexColonia($d_mnpio);
if ($listado) {
    if (pg_num_rows($listado) > 0) {
        while ($row = pg_fetch_object($listado)) {
            echo '<option value="' . $row->id_cat_sepomex . '">' . $row->colonia_origen . '</option>';
        }
    }
}

