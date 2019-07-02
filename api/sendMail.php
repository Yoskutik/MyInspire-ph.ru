<?php

require_once('HTML.php');

//TODO
mail (
    '<yoskutik@gmail.com>, <tatiana.mix.1910@gmail.com>',
    $_POST['subject'],
    HTML::render('mail', [
        'FROM_NAME' => $_POST['name'],
        'FROM_EMAIL' => $_POST['email'],
        'SUBJECT' => $_POST['subject'],
        'BODY' => $_POST['body'],
        'SITE_NAME' => $_SERVER['HTTP_HOST'],
    ], 'patterns')
);