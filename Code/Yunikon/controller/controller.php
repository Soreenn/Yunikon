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


        $file_name = $_FILES['addImage']['name'];
        $file_tmp = $_FILES['addImage']['tmp_name'];
        $extension = pathinfo($_FILES["addImage"]["name"], PATHINFO_EXTENSION);
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif' | $extension == 'JPG' || $extension == 'JPEG' || $extension == 'PNG' || $extension == 'GIF') {
            $name = "view/content/events/images/" .  date("d-m-y-H-i-s") . $file_name;
            move_uploaded_file($file_tmp, $name);
        } else {
            header_remove();
            header("Location: /home");
        }

    require_once "model/model.php";
    registerEvent($eventName, $eventStarting, $eventEnding, $eventLocation, $eventDescription, $name);

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
        $exhibitor = 0;
        //try to check if user/psw are matching with the database
        if ($userPsw == $userPswConfirm) {
            require_once "./model/model.php";
            if (RegisterUser($userEmailAddress, $userPsw, $firstname, $lastname, $phone)) {
                createSession($userEmailAddress, $firstname, $lastname, $exhibitor);
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
            $exhibitor = $userInfo[0]['exhibitor'];
            createSession($userEmailAddress, $firstname, $lastname, $exhibitor);
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

function createSession($userEmailAddress, $firstname, $lastname, $exhibitor)
{
    $_SESSION['userEmailAddress'] = $userEmailAddress;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['exhibitor'] = $exhibitor;
}

function eventList(){
    require_once "model/model.php";
    $items = showEvent();
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

function account(){
    require "view/account.php";
}

function event($eventId){

    require_once "model/model.php";
    $eventData = getEventById($eventId);
    if ($eventData == false) {
        require "view/home.php";
    }
    else {
        require "view/event.php";
    }
}

function addEvent(){
    require "view/add-event.php";   
}
function contact(){
    require "view/contact.php";
}

function sendMail($infoMail){

    if($infoMail['exposant'] == "on"){
        $header = "Demande d'exposant";
        $message = $_SESSION['userEmailAddress'] . " - " . $infoMail['nom'] . " souhaite convertir son compte pour devenir exposant sur Yunikon !";
    }
    else if($infoMail['bug'] == "on"){
        $header = "Rapport bug";
        $message = $_SESSION['userEmailAddress'] . " - " . $infoMail['nom'] . " créer un rapport de bug !";
    }
    else if($infoMail['question'] == "on"){
        $header = "Question utilisateur";
        $message = $_SESSION['userEmailAddress'] . " - " . $infoMail['nom'] . " souhaite poser une question auprès de Yunikon.";
    }
    else if($infoMail['autre'] == "on"){
        $header = "Autre sujet";
        $message = $_SESSION['userEmailAddress'] . " - " . $infoMail['nom'] . " est là pour une autre raison que celles notifiés.";
    }

        require_once "PHPMailer/PHPMailerAutoload.php";
    
        $mail = new PHPMailer();
    
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "yunikon.noreply@gmail.com";
        $mail->Password = "";
        $mail->Port = "587";
        $mail->SMTPSecure = "tls";
    
        $mail->From = "yunikon.noreply@gmail.com";
        $mail->FromName= "Yunikon - No Reply";
        $mail->addAddress("gabriel.**");
        $mail->addAddress("loik.**");
        $mail->addAddress("cyprien.**");
        $mail->Subject = ($header);
        $mail->Body = $message . "<br><br>" . $infoMail['message'];
        $mail->IsHTML(true); 
    
        $mail->send();
    
        header("Location: /home");
}

function forgotPassword(){
    require "view/forgot_password.php";
}

function forgotPasswordRequest($userInfo){
    if (isset($userInfo['email']) && isset($userInfo['newPassword']) && isset($userInfo['newPasswordConfirm']) && isset($userInfo['token'])) {
        //extract login parameters
        $userPsw = $userInfo['newPassword'];
        $userPswConfirm = $userInfo['newPasswordConfirm'];
        //try to check if user/psw are matching with the database
        if ($userPsw == $userPswConfirm) {
            require_once "./model/model.php";
            $reply = getTokens($userInfo);
            if($reply == 'TRUE'){
                updatePsw($userInfo);
                header("Location: /login");
            }
        } else {
            $_GET['registerError'] = true;
            header("Location: /register");
        }
    } else { //the user does not yet fill the form
        header("Location: /register");
    }
}