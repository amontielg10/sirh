
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<script>
    
    console.log(esEntero('',122));

    function esEntero(text,num) {
    let bool = true;
    if (!Number.isInteger(num)){
        bool = false;
        //mensajeError(text + ' debe tener números enteros')
    }
    return bool;
}
</script>

</html>






<?php

/*
function encrypt($data, $key) {
    $method = 'aes-256-cbc';
    // Generar un IV (vector de inicialización)
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
    // Cifrar los datos
    $encrypted = openssl_encrypt($data, $method, $key, 0, $iv);
    // Codificar el IV y los datos cifrados en base64 para su almacenamiento
    return base64_encode($iv . $encrypted);
}

$key = 'key';
$data = 'Este es el texto a cifrar';
$encryptedData = encrypt($data, $key);
$decryptedData = decrypt($encryptedData, 'key');



echo "Datos cifrados: " . $encryptedData;
echo '<br>';
echo "Datos descifrados: " . $decryptedData;

function decrypt($data, $key) {
    $method = 'aes-256-cbc';
    // Decodificar los datos en base64
    $data = base64_decode($data);
    // Extraer el IV y los datos cifrados
    $iv_length = openssl_cipher_iv_length($method);
    $iv = substr($data, 0, $iv_length);
    $encryptedData = substr($data, $iv_length);
    // Descifrar los datos
    return openssl_decrypt($encryptedData, $method, $key, 0, $iv);
}

//$encryptedData = 'aquí_va_el_dato_cifrado_en_base64'; // reemplaza con el dato cifrado
*/