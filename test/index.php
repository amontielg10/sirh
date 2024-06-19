<?php

$UR = "https://repocloud.imssbienestar.gob.mx/";
$usuario = 'rodolfo.trejo';
$password = '/lm3u4Xljh_1';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$usuario:$password");
$result = curl_exec($ch);
curl_close($ch);
echo $result;


