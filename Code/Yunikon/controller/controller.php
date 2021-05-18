<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

function home()
{
    require "view/home.php";
}

function register()
{
    require "view/register.php";
}

function lost()
{
}

function login()
{
    require "view/login.php";
}

function registerRequest($registerData)
{
    if (isset($registerData['email']) && isset($registerData['password']) && isset($registerData['passwordConfirm'])) {
        //extract login parameters
        $userEmailAddress = $registerData['email'];
        $userPsw = $registerData['password'];
        $firstname = $registerData['firstname'];
        $lastname = $registerData['lastname'];
        $phone = $registerData['phone'];
        $userPswConfirm = $registerData['passwordConfirm'];
        //try to check if user/psw are matching with the database
        if ($userPsw == $userPswConfirm) {
            require_once "./model/model.php";
            if (RegisterUser($userEmailAddress, $userPsw, $firstname, $lastname, $phone)) {
                createSession($userEmailAddress, $firstname, $lastname);
                $_GET['registerError'] = false;
                header("Location: /home");
            } else { 
                $_GET['registerError'] = true;
                header("Location: /register");
            }
        } else {
            $_GET['registerError'] = true;
            header("Location: /register");
        }
    } else { //the user does not yet fill the form
        header("Location: /register");
    }
}

function createSession($userEmailAddress, $firstname, $lastname)
{
    $_SESSION['userEmailAddress'] = $userEmailAddress;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
}
