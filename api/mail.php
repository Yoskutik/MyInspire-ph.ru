<?php

require_once('../HTML.php');

$html = ['TITLE' => 'Добро пожаловать!'];
$page = HTML::render('mail.html', [
    'FROM_NAME' => 'name',
    'FROM_EMAIL' => 'email',
    'SUBJECT' => 'SUBJECT',
    'BODY' => 'body',
    'SITE_NAME' => $_SERVER['HTTP_HOST'],
], 'api/patterns');

echo $page;