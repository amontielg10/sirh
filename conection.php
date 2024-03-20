<?php
$password = "pg2024";
$username = "postgres";
$dbname = "DSINFOTEC";
$host = "localhost";
$port = "5432";

try {
    $connectionDB = "host=$host port=$port dbname=$dbname user=$username password=$password";
    $connectionDBsPro = pg_pconnect($connectionDB);
    $authnQuery = pg_query($connectionDBsPro, "SELECT * FROM users");
    try {
        $authnQuery;
        $row = pg_fetch_array($authnQuery);
        echo $row["nick"];
    } catch (\Throwable $e){
        echo "Error connecting ".$e; 
    }
} catch (\Throwable $e) {
    echo "Error connecting to data base + ".$e; 
}