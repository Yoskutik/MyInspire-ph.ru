<?php

$string = file_get_contents(__DIR__ . '/linkCounter.json');
$json = json_decode($string, true);

$json[$_POST['id']]++;

$fp = fopen('linkCounter.json', 'w');
fwrite($fp, json_encode($json, JSON_PRETTY_PRINT));
fclose($fp);

echo 'OK';