<?php
require "./functions.php";
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/login':
        require './login.php';
        break;
    case '/register':
        require './register.php';
        break;
    case '/profile':
        require './profile.php';
        break;
    case '/registration':
        echo registration($_POST);
        break;
    case '/logout':
        echo logout();
        break;
    case '/auth':
        echo auth($_POST);
        break;
    case '/change':
        echo change($_POST);
        break;
    default:
        header('Location: http://testNew/register');
        break;
}
