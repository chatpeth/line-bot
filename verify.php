<?php
$access_token = 'R9LH7FkIuRaN36op+y6BEi//KpV7igmRA2F9kxIEnQv8j+eSfmgP/nJLppQolaerQXq9EjBMU1EIXL/d0eipVQqCXVLOLBts64dn8KtRkK2Qx26RYjT5z0y5ezRkdF7Ihh5EihjaSqtKXRIdTUGOuQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;