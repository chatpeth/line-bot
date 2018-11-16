<?php
$access_token = 'YNQ5IhAh8gvZtOCrt+EfXlvUoqApL5KVARLEINs0P4kR+y9sj5i0+jgLq0y8xaJdQXq9EjBMU1EIXL/d0eipVQqCXVLOLBts64dn8KtRkK1ofWblS8LAHhNYqCwL2p2QdQjSWBctZP8Y968cNhwnTwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;