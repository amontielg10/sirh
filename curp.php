<?php
// Arreglo inicial
$arreglo = [
    'a' => "elemento1", 
    'b' => "elemento2", 
    'c' => "elemento3"];

// Agregar un nuevo elemento al final del arreglo
array_push($arreglo, 'd',"nuevo_elemento");

// Mostrar el arreglo actualizado
print_r($arreglo);