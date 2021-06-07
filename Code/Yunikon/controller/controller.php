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


function createEvent($eventData)
{
     //(isset($eventData['addName']) && isset($eventData['addStarting']) && isset($eventData['addEnding']) && isset($eventData['addLocation'])) {
        //extract login parameters
        $eventName = $eventData['addName'];
        $eventStarting = $eventData['addStarting'];
        $eventEnding = $eventData['addEnding'];
        $eventLocation = $eventData['addLocation'];
        $eventDescription = $eventData['addDescription'];
        $eventImage = $eventData['addImage'];


    require_once "model/model.php";
    registerEvent($eventName, $eventStarting, $eventEnding, $eventLocation, $eventDescription, $eventImage);

    require "view/home.php";
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

function loginRequest($loginData)
{
    //if a login request was submitted
    if (isset($loginData['email']) && isset($loginData['password'])) {
        //extract login parameters
        $userEmailAddress = $loginData['email'];
        $userPsw = $loginData['password'];
        //try to check if user/psw are matching with the database
        require "./model/model.php";
        if (isLoginCorrect($userEmailAddress, $userPsw)) {
            $userInfo = getUserInfo($userEmailAddress);
            $firstname = $userInfo[0]['name'];
            $lastname = $userInfo[0]['lastname'];
            createSession($userEmailAddress, $firstname, $lastname);
            $_GET['loginError'] = false;
            header("Location: /home");
        } else { //if the user/psw does not match, login form appears again
            $_GET['loginError'] = true;
            header("Location: /login");
        }
    } else { //the user does not yet fill the form
        header("Location: /login");
    }
}

function createSession($userEmailAddress, $firstname, $lastname)
{
    $_SESSION['userEmailAddress'] = $userEmailAddress;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
}

function eventList(){
    require "view/eventList.php";
}

function logout()
{
    $_SESSION = array();
    session_destroy();
    header("Location: /home");
}

function exhibitor(){
require_once "./model/model.php";
$res = getUserExhibitor(@$_SESSION['userEmailAddress']);
return $res;
}

function event(){
    require "view/event.php";
}

function addEvent(){
    require "view/add-event.php";   
}
function contact(){
    require "view/contact.php";
}
