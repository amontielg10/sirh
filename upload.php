<?php
// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
    // Ruta donde se almacenará temporalmente el archivo
    $carpeta_temporal = "uploads/";

    // Nombre temporal del archivo
    $archivo_temporal = $_FILES["archivo"]["tmp_name"];

    // Nombre real del archivo
    $nombre_archivo = basename($_FILES["archivo"]["name"]);

    // Obtener la extensión del archivo
    $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);

    // Validar si el archivo es válido
    //$permitidos = array("jpg", "jpeg", "png", "gif");
    $permitidos = array("jpg", "jpeg", "png", "gif", "csv");
    if (!in_array($extension, $permitidos)) {
        echo "Solo se permiten archivos JPG, JPEG, PNG, CSV y GIF.";
    } else {
        // Mover el archivo a la carpeta temporal
        $ruta_temporal = $carpeta_temporal . $nombre_archivo;
        if (move_uploaded_file($archivo_temporal, $ruta_temporal)) {
            echo "El archivo se ha subido correctamente.";
            echo "<br>Ruta temporal: " . $ruta_temporal;


            // Cargar el archivo Excel
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load($_FILES['archivo_excel']['tmp_name']);
$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

// Procesar los datos y insertarlos en la base de datos
foreach ($sheetData as $row) {
    
  
$columna1 = $row['A'];
    
   
$columna2 = $row['B'];
    
  
$columna3 = $row['C'];
    
    
    
  
// Insertar los datos en la base de datos
    $sql = "INSERT INTO nombre_tabla (columna1, columna2, columna3) VALUES ('$columna1', '$columna2', '$columna3')";
    $sql1 ="INSERT INTO nombre_tabla (c1,c2,c3) VALUES ('$columna1',)"    
    
    
  

 
if ($conn->query($sql) !== TRUE) {
echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


    }
}

/

   
// Cerrar la conexión
$conn->close();



ech
echo "Datos cargados exitosamente en la base de datos.";







            /*
            /// cambios_en
            $password = "pg2024";
            $username = "postgres";
            $dbname = "DSINFOTEC";
            $host = "localhost";
            $port = "5432";
            $conn = pg_connect("host=$host port=$port dbname=$dbname user=$username password=$password");

            if (!$conn) {
                echo "Error: No se pudo conectar a la base de datos.";
                exit;
            }

            // Ruta al archivo CSV
            $csv_file = "C:/xampp/htdocs/infotec-project/uploads/" . $nombre_archivo;

            // Nombre de la tabla en la base de datos
            $table_name = "prueba";

            // Comando COPY para cargar datos desde el archivo CSV
            $sql = "COPY $table_name (nombre, fecha, numero) FROM '$csv_file' WITH CSV HEADER DELIMITER ','";
            // COPY wheat FROM 'wheat_crop_data.csv' DELIMITER ';' WITH CSV HEADER DELIMITER ',';
            // COPY prueba FROM 'C:\Users\rodolfo.trejo\Desktop\prueba.csv' WITH CSV HEADER DELIMITER ',';

            // Ejecutar el comando COPY
            $result = pg_query($conn, $sql);

            if (!$result) {
                echo "Error al cargar datos: " . pg_last_error($conn);
            } else {
                echo "Datos cargados exitosamente.";
            }*/
            try {
                unlink($csv_file);
                echo "<br> Archivo eliminado";
            } catch (\Throwable $th) {
                echo "erro " . $th;
            }
        } else {
            echo "Ha ocurrido un error al subir el archivo.";
        }
    }
} else {
    echo "Error: No se ha enviado ningún archivo.";
}
?>