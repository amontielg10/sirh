<?php
// Establecer la conexión a la base de datos PostgreSQL
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
$csv_file = "C:\prueba.csv";

// Nombre de la tabla en la base de datos
$table_name = "prueba";

// Comando COPY para cargar datos desde el archivo CSV
$sql = "COPY $table_name FROM '$csv_file' WITH CSV HEADER DELIMITER ','";
// COPY wheat FROM 'wheat_crop_data.csv' DELIMITER ';' WITH CSV HEADER DELIMITER ',';
// COPY prueba FROM 'C:\Users\rodolfo.trejo\Desktop\prueba.csv' WITH CSV HEADER DELIMITER ',';

// Ejecutar el comando COPY
$result = pg_query($conn, $sql);

if (!$result) {
    echo "Error al cargar datos: " . pg_last_error($conn);
} else {
    echo "Datos cargados exitosamente.";
}

// Cerrar la conexión
pg_close($conn);
?>