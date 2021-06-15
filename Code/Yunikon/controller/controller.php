<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function home()
{
    require_once "model/model.php"; 
    $nextEvent = getNextEvent();
    require "view/home.php";
}

function register()
{
    $errorRegister = "";
    require "view/register.php";
}

function lost()
{
}

function login()
{
    $errorLogin = "";
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

    home();
}



function registerRequest($registerData)
{
    $errorRegister = "";
    if (!empty($registerData['email']) && !empty($registerData['password']) && !empty($registerData['passwordConfirm'])) {
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
                createSession($userEmailAddress, $firstname, $lastname, $exhibitor, $phone);
                $_GET['registerError'] = false;
                header("Location: /home");
            } else {
                $errorRegister = "Oups... Il y a un problème chez nous...";
                require "view/register.php";
            }
        } else {
            $errorRegister = "Oups... Les mots de passe ne correspondent pas";
            require "view/register.php";
        }
    } else { //the user does not yet fill the form
        $errorRegister = "Oups... Veillez à remplir le formulaire";
        require "view/register.php";
    }
}

function loginRequest($loginData)
{
    $errorLogin = "";
    //if a login request was submitted
    if ($loginData['email'] !== "" && $loginData['password'] !== "") {
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
            $phone = $userInfo[0]['phoneNumber'];
            createSession($userEmailAddress, $firstname, $lastname, $exhibitor, $phone);
            header("Location: /home");
        } else { //if the user/psw does not match, login form appears again
            $errorLogin = "Oups... Vos identifiants semblent incorrectes";
            require "view/login.php";
        }
    } else { //the user does not yet fill the form
        $errorLogin = "Oups... Veillez à remplir le formulaire";
        require "view/login.php";
    }
}

function createSession($userEmailAddress, $firstname, $lastname, $exhibitor, $phone)
{
    $_SESSION['userEmailAddress'] = $userEmailAddress;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['exhibitor'] = $exhibitor;
    $_SESSION['phoneNumber'] = $phone;
}

function sessionId()
{

    $userEmailAddress = $_SESSION['userEmailAddress'];
    require_once "model/model.php";
    $userInfo = getUserInfo($userEmailAddress);
    $userId = $userInfo[0]['id'];
    return $userId;
}

function eventList()
{
    require_once "model/model.php";
    $nextEvent = getNextEvent();
    $items = showEvent();
    require "view/eventList.php";
}

function logout()
{
    $_SESSION = array();
    session_destroy();
    header("Location: /home");
}

function exhibitor()
{
    require_once "./model/model.php";
    $res = getUserExhibitor(@$_SESSION['userEmailAddress']);
    return $res;
}

function account()
{
    require "view/account.php";
}

function event($eventId)
{

    require_once "model/model.php";
    $eventData = getEventById($eventId);
    if ($eventData == false) {
        home();
    } else {
        require "view/event.php";
    }
}

function addEvent()
{
    require "view/add-event.php";
}
function contact()
{
    require "view/contact.php";
}

function sendMail($infoMail)
{

    if ($infoMail['exposant'] == "on") {
        $header = "Demande d'exposant";
        $message = $_SESSION['userEmailAddress'] . " - " . $infoMail['nom'] . " souhaite convertir son compte pour devenir exposant sur Yunikon !";
    } else if ($infoMail['bug'] == "on") {
        $header = "Rapport bug";
        $message = $_SESSION['userEmailAddress'] . " - " . $infoMail['nom'] . " créer un rapport de bug !";
    } else if ($infoMail['question'] == "on") {
        $header = "Question utilisateur";
        $message = $_SESSION['userEmailAddress'] . " - " . $infoMail['nom'] . " souhaite poser une question auprès de Yunikon.";
    } else if ($infoMail['autre'] == "on") {
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
    $mail->FromName = "Yunikon - No Reply";
    $mail->addAddress("gabriel.**");
    $mail->addAddress("loik.**");
    $mail->addAddress("cyprien.**");
    $mail->Subject = ($header);
    $mail->Body = $message . "<br><br>" . $infoMail['message'];
    $mail->IsHTML(true);

    $mail->send();

    header("Location: /home");
}

function getToken($userInfo)
{
    $errorForgot = "";
    $errorToken = "";
    if (!empty($userInfo['email'])) {
        $_SESSION['token'] = uniqid();

        require_once "PHPMailer/PHPMailerAutoload.php";

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "yunikon.noreply@gmail.com";
        $mail->Password = "Yuyuninikoko";
        $mail->Port = "587";
        $mail->SMTPSecure = "tls";

        $mail->From = "yunikon.noreply@gmail.com";
        $mail->FromName = "Yunikon - No Reply";
        $mail->addAddress($userInfo['email']);
        $mail->Subject = "Password forgot";
        $mail->Body = "Your current Token is " . $_SESSION['token'];
        $mail->IsHTML(true);

        $mail->send();
        header("Location: /forgotPassword");
    } else {
        $errorToken = "Oups... Veillez à remplir le formulaire";
        require "view/forgot_password.php";
    }
}

function forgotPassword()
{
    $errorToken = "";
    $errorForgot = "";
    require "view/forgot_password.php";
}

function changeRequest($changeData)
{

    $errorMsg = "";
    $successMsg = "";
    $userEmail = $_SESSION['userEmailAddress'];
    $userPsw = $changeData['password'];
    //check if password is the same as the account's email one
    require_once "model/model.php";
    if (isLoginCorrect($userEmail, $userPsw)) {
        //set email
        if (empty($changeData['email'])) {
            $email = $_SESSION['userEmailAddress'];
        } else {
            $email = $changeData['email'];
        }
        //check if email is already used
        $checking = getUserInfo($email);
        if (!empty($checking) && strcmp($email, $_SESSION['userEmailAddress']) !== 0) {
            $errorMsg = "L'email que vous souhaitez utilisé est déjà occupé par un autre compte";
        } else {
            //set phone
            if (empty($changeData['phone'])) {
                $phone = $_SESSION['phoneNumber'];
            } else {
                $phone = $changeData['phone'];
            }
            //check if phone is already used
            $checking = getUserInfoByPhone($phone);
            if (!empty($checking)&& strcmp($phone, $_SESSION['phoneNumber']) !== 0) {
                $errorMsg = "Le numéro de tel que vous souhaitez utilisé est déjà occupé par un autre compte";
            } else {
                //set password
                if (!empty($changeData['newPassword'])) {
                    if (strcmp($changeData['newPassword'], $changeData['passwordConfirm']) == 0) {
                        $psw = $changeData['newPassword'];
                    } else {
                        $psw = $changeData['password'];
                        $errorMsg = "Le nouveau mot de passe à mal été tapé";
                    }
                } else {
                    $psw = $changeData['password'];
                }
                $id = sessionId();
                echo "'$email, $phone, $psw, $id'";
                //changeUsersInfos($email, $phone, $psw, $id);
                $successMsg = "Les informations ont bien été changées";
            }
        }
    } else {
        $errorMsg = "Le mot de passe actuel est erroné.";
    }

    require "view/Change-infos.php";
}

function forgotPasswordRequest($userInfo)
{
    $errorToken = "";
    $errorForgot = "";
    if (!empty($userInfo['email']) && !empty($userInfo['newPassword']) && !empty($userInfo['newPasswordConfirm']) && !empty($userInfo['token'])) {
        //extract login parameters
        $userPsw = $userInfo['newPassword'];
        $userPswConfirm = $userInfo['newPasswordConfirm'];
        //try to check if user/psw are matching with the database
        if ($userPsw == $userPswConfirm) {
            if ($userInfo['token'] == $_SESSION['token']) {
                require_once "./model/model.php";
                updatePsw($userInfo);
                header("Location: /login");
            } else {
                $errorForgot = "Oups... Le token n'est pas correcte";
                require "view/forgot_password.php";
            }
        } else {
            $errorForgot = "Oups... Les mots de passe ne correspondent pas";
            require "view/forgot_password.php";
        }
    } else { //the user does not yet fill the form
        $errorForgot = "Oups... Veillez à remplir le formulaire";
        require "view/forgot_password.php";
    }
}

function changeRegister()
{
    $errorMsg = "";
    $successMsg = "";
    require "view/Change-infos.php";
}
