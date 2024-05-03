<?php
// Definir un array asociativo
$array = [
    'nombre' => 'Juan', 
    'edad' => 30, 
    'ciudad' => 'Barcelona'
];

$array1 = [
    '1' => 'Juan', 
    '2' => 30, 
    '3' => 'Barcelona'
];
// Convertir el array en una cadena usando http_build_query


// Imprimir la cadena resultante
echo concatArray($array, $array1); // Esto imprimirá: nombre=Juan&edad=30&ciudad=Barcelona

function concatArray($dataX, $dataY){
    $resultX = http_build_query($dataX);
    $resultY = http_build_query($dataY);
    return "$resultX $resultY";
}