<?php

$uploadFile = __DIR__ . '/../../SmartGuys/' . basename($_FILES['database']['name']);

if (md5(date('Y-m-d') . 'qwertyuiop') === $_POST['hidden']
        && move_uploaded_file($_FILES['database']['tmp_name'], $uploadFile)) {
    http_send_status(200);
} else {
    http_send_status(400);
}