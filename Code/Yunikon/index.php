<?php
header_remove();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require "controller/controller.php";

// Remove get parameters
$uri = strtok($_SERVER["REQUEST_URI"], '?');
// Remove ending /
$uri = (strlen($uri) > 1) ? preg_replace("/\/$/", '', $uri) : $uri;

switch ($_SERVER["REQUEST_URI"]) {
    case "/" :
    case "/home" :
        home();
        break;
        case "/register" :
            register();
            break;
        case "/login" :
            login();
            break;
        case "/registerRequest" :
            registerRequest($_POST);
            break;
    default:
        lost();
        break;
}