<?php
header_remove();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require "controller/controller.php";

switch ($_SERVER["REQUEST_URI"]) {
    case "/" :
    case "/home" :
    case "/home/" :
        home();
        break;
    default:
        lost();
        break;
}