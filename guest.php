<?php
require_once('functions.php');


session_start();
if (isset($_SESSION['USER'])) {
    header('Location: /');
    die();
}


$content = include_template('guest.php', [
]);


echo include_template('layout.php', [
    'title' => 'TM Tool',
    'content' => $content,
    'user' => $_SESSION['USER']??NULL
]);
