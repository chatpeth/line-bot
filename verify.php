<?php
$access_token = 'rNyL30zqBBdJuZZmSavU6xyK2bDcefL89eKp0eWTOV+b6cGVJlYwxQ0vROCzGhzYtRE7hBqLttYOoSuu21i1gDBfNRlbgyF0SAEGitERV0bg9QdToiyTIGqasjrkAH668beY5+K5G08oDP9zvfBEEAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;