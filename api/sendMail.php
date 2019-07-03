<?php

require_once('../HTML.php');
error_reporting(0);

//TODO

try {
    $status = mail(
        'Дмитрий <yoskutik@gmail.com>, Татьяна <tatiana.mix.1910@gmail.com>',
        $_POST['subject'],
        HTML::render('mail.html', [
            'FROM_NAME' => $_POST['name'],
            'FROM_EMAIL' => $_POST['email'],
            'SUBJECT' => $_POST['subject'],
            'BODY' => $_POST['body'],
            'SITE_NAME' => $_SERVER['HTTP_HOST'],
        ], 'api/patterns'),
        "From: {$_POST['name']} <{$_POST['email']}>\r\nReply-To: {$_POST['name']} <{$_POST['email']}>");
} catch (Error $e) {}

if (!$status) http_response_code(400);

echo json_encode(['status' => $status ? 'OK' : 'ERROR']);
