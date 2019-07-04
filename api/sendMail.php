<?php

require_once('../HTML.php');
error_reporting(0);

try {
    header('Content-type: application/json');

    $to = '<yoskutik@gmail.com>, <tatiana.mix.1910@gmail.com>, <da_afo_w@mail.ru>, <tatiana@myinspire-ph.ru>';
    $subject = $_POST['subject'];
    $body = HTML::render('mail.html', [
            'FROM_NAME' => $_POST['name'],
            'FROM_EMAIL' => $_POST['email'],
            'SUBJECT' => $_POST['subject'],
            'BODY' => $_POST['body'],
            'YEAR' => date('Y'),
        ],
        'api/patterns');
    $headers = "From: Татьяна <tatiana@myinspire-ph.ru>" . "\r\n" .
        "Reply-To: <tatiana@myinspire-ph.ru>" . "\r\n" .
        'Content-type: text/html; charset=UTF-8' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $status = mail($to, $subject, $body, $headers);

    mail($to, $subject, $body, "From: {$_POST['name']} <{$_POST['email']}>\r\nReply-To: <{$_POST['email']}>\r\nContent-type: text/html; charset=UTF-8\r\nX-Mailer: PHP/" . phpversion());
} catch (Error $e) {
    if ($e) $status = !!$e;
}

if (!$status) http_response_code(400);

echo json_encode(['status' => $status ? 'OK' : 'ERROR']);

