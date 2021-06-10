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

switch ($uri) {
    case "/":
    case "/home":
        home();
        break;
    case "/register":
        register();
        break;
    case "/login":
        login();
        break;
    case "/registerRequest":
        registerRequest($_POST);
    case "/eventList":
        eventList();
        break;
    case "/loginRequest":
        loginRequest($_POST);
        break;
    case "/logout":
        logout();
        break;
    case "/event":
        event(@$_GET['id']);
        break;
    case "/add-event":
        addEvent();
        break;
    case "/registerEvent":
        createEvent($_POST);
        break;
    case "/contact":
        contact();
        break;
    case "/sendMail":
        sendMail($_POST);
        break;
    case "/account":
        account($_GET);
        break;
    default:
        lost();
        break;
}
