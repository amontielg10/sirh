<?php

$password = "pgs2023";
$username = "postgres";
$dbname = "infotec_db";
$host = "localhost";
$port = "5432";

try {
    $connectionDB = "host=$host port=$port dbname=$dbname user=$username password=$password";
    $connectionDBsPro = pg_pconnect($connectionDB);
} catch (\Throwable $e) {
    echo "Error connecting to data base + ".$e; 
}