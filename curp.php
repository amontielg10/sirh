<?php



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
    $archivo_temporal = $_FILES["archivo"]["tmp_name"];
    $nombre_archivo = basename($_FILES["archivo"]["name"]);
    $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
    $lineas = file($archivo_temporal);
    $permitidos = array("csv");

    if (!in_array($extension, $permitidos)) {
        echo "Solo se permiten archivos CSV";
    } else {
        $i = 0;
        /// SE AGREGA LA PRIMER CARGA MASIVA
        //echo $idCtrlCargaMasiva;
        foreach ($lineas as $linea) {
            $cantidad_registros = count($lineas);
            $cantidad_regist_agregados = ($cantidad_registros - 4);

            if ($i != 0) {
                $datos = explode(",", $linea);

                $rfc = !empty($datos[0]) ? trim($datos[0]) : '';
                $curp = !empty($datos[1]) ? trim($datos[1]) : '';
                $curpConyuge = !empty($datos[2]) ? trim($datos[2]) : '';
                $apellidoPaterno = !empty($datos[3]) ? trim($datos[3]) : '';
                $apellidoMaterno = !empty($datos[4]) ? trim($datos[4]) : '';
                $nombre = !empty($datos[5]) ? trim($datos[5]) : '';



            }
            echo "<br>";
            $i++;
        }
    }
}