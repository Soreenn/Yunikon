    <?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function home()
{
    //get date of the next event
    require_once "model/model.php";
    $nextEvent = getNextEvent();

    //go to the home page
    require "view/home.php";
}

function register()
{
    //go to the register page
    $errorRegister = "";
    require "view/register.php";
}

function decrementTickets($eventId){
    //decrement ticket when user buy one
    $userMail = $_SESSION['userEmailAddress'];
    require_once "model/model.php";
    $userDatas = getUserInfo($userMail);
    $userId = $userDatas[0]['id'];

    //get info of the event by id
    require_once "model/model.php";
    $eventData = getEventById($eventId);

    $img = $eventData[0]['image'];
    $name = $eventData[0]['name'];

    //send email with the last ticket buyed
    require_once "model/model.php";
    $buyedID = decrement($eventId, $userId);

    mailBuy($buyedID, $img, $name, $userMail, $eventId);
    //event($eventId);
}

function lost()
{
    //go to the error 404 page
    require "view/Lost.php";
}

function login()
{   
    //go to the login page
    $errorLogin = "";
    require "view/login.php";
}


function createEvent($eventData)
{

    //set event datas
    $eventName = $eventData['addName'];
    $eventStarting = $eventData['addStarting'];
    $eventEnding = $eventData['addEnding'];
    $eventLocation = $eventData['addLocation'];
    $eventDescription = $eventData['addDescription'];

    //set tickets datas
    $ticketNumber = $eventData['ticketsNumber'];
    $ticketPrice = $eventData['ticketsPrice'];

    //check if the image is available
    $file_name = $_FILES['addImage']['name'];
    $file_tmp = $_FILES['addImage']['tmp_name'];
    $extension = pathinfo($_FILES["addImage"]["name"], PATHINFO_EXTENSION);
    if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif' | $extension == 'JPG' || $extension == 'JPEG' || $extension == 'PNG' || $extension == 'GIF') {
        $imageName = "view/content/events/images/" .  date("d-m-y-H-i-s") . $file_name;
        move_uploaded_file($file_tmp, $imageName);
    } else {
        header_remove();
        header("Location: /home");
    }

    //add event to the db
    require_once "model/model.php";
    registerEvent($eventName, $eventStarting, $eventEnding, $eventLocation, $eventDescription, $imageName);


    //get event id
    $eventInfos = getEventId($eventName);
    $eventId = $eventInfos[0]['id'];
    //add the true number of ticket in db
    for ($i = 0; $i < $ticketNumber; $i++) {
        registerTicket($ticketPrice, $eventId);
    }
    //send mail to the newsletter
    sendEventNewsletter($eventName, $imageName, $eventId);
    //go to the home page
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
                $errorRegister = "Oups... Il y a un probl??me chez nous...";
                require "view/register.php";
            }
        } else {
            $errorRegister = "Oups... Les mots de passe ne correspondent pas";
            require "view/register.php";
        }
    } else { //the user does not yet fill the form
        $errorRegister = "Oups... Veillez ?? remplir le formulaire";
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
        $errorLogin = "Oups... Veillez ?? remplir le formulaire";
        require "view/login.php";
    }
}

function createSession($userEmailAddress, $firstname, $lastname, $exhibitor, $phone)
{
    //set session var
    $_SESSION['userEmailAddress'] = $userEmailAddress;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['exhibitor'] = $exhibitor;
    $_SESSION['phoneNumber'] = $phone;
}

function sessionId()
{
    //get current user's id
    $userEmailAddress = $_SESSION['userEmailAddress'];
    require_once "model/model.php";
    $userInfo = getUserInfo($userEmailAddress);
    $userId = $userInfo[0]['id'];
    return $userId;
}

function eventList()
{
    //get next event date and every events
    require_once "model/model.php";
    $nextEvent = getNextEvent();
    $items = showEvent();
    //go to the event list page
    require "view/eventList.php";
}

function logout()
{
    //clear the sessions vars
    $_SESSION = array();
    session_destroy();
    header("Location: /home");
}

function exhibitor()
{
    //check if current user is an exhibitor
    require_once "./model/model.php";
    $res = getUserExhibitor(@$_SESSION['userEmailAddress']);
    return $res;
}

function account()
{
    //get current user's datas
    require_once "model/model.php";
    $user = getUserInfoByPhone($_SESSION['phoneNumber']);
    $userId = $user[0]['id'];

    //get usersticket/events
    $tickets = getTicketsInfos($userId);
    $items = getEventByUserId($userId);
    echo $tickets[0]['Event_id'];
    echo $event[0]['image'];
    
    //go to the account page
   require "view/account.php";
}

function deleteEvent($eventId){
    //delete event by id 
    require_once "model/model.php";
    delEvent($eventId);
    //return to account page
    account();
}

function event($eventId)
{

    require_once "model/model.php";
    //count the number of reaminings tickets
    $tickets = ticketsRemaining($eventId);
    $remaining = 0;

    foreach ($tickets as $count){
        $remaining ++;
    }
    //set current date
    $date = date("Y-m-d");

    //get ticket price
    $price = $tickets[0]['price'];
    $eventData = getEventById($eventId);
    if ($eventData == false) {
        home();
    } else {
        //go to the event page
        require "view/event.php";
    }
}

function addEvent()
{
    //go to the creating event page
    require "view/add-event.php";
}
function contact()
{
    //go to the contact page
    require "view/contact.php";
}

function sendMail($infoMail)
{
    //create and send an email
    if ($infoMail['subject'] == "exhibitor") {

        $header = "Demande d'exposant";
        $message = $_SESSION['userEmailAddress'] . " - " . $_SESSION['name'] . " souhaite convertir son compte pour devenir exposant sur Yunikon !";
    } else if ($infoMail['subject'] == "bug") {

        $header = "Rapport bug";
        $message = $_SESSION['userEmailAddress'] . " - " . $_SESSION['name'] . " cr??er un rapport de bug !";
    } else if ($infoMail['subject'] == "question") {
 
        $header = "Question utilisateur";
        $message = $_SESSION['userEmailAddress'] . " - " . $_SESSION['name'] . " souhaite poser une question aupr??s de Yunikon.";
    } else if ($infoMail['subject'] == "other") {

        $header = "Autre sujet";
        $message = $_SESSION['userEmailAddress'] . " - " . $_SESSION['name'] . " est l?? pour une autre raison que celles notifi??s.";
    } else {
        $header = "ALERT BUG";
        $message = "Un soucis a ??t?? rencontr?? avec le message de " . $_SESSION['userEmailAddress'];
    }

    require_once "PHPMailer/PHPMailerAutoload.php";
    //set mailer datas
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
    $mail->addAddress("gabriel.machado-pereira@cpnv.ch");
    $mail->addAddress("loik.meylan@cpnv.ch");
    $mail->addAddress("cyprien.jaquier@cpnv.ch");
    $mail->addAddress("yoann.bonzon@cpnv.ch");
    $mail->Subject = ($header);
    $mail->Body = $message . "<br><br>" . $infoMail['message'];
    $mail->IsHTML(true);

    $mail->send();

    header("Location: /home");
}

function getToken($userInfo)
{
    //create and check user's token 
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
        $errorToken = "Oups... Veillez ?? remplir le formulaire";
        require "view/forgot_password.php";
    }
}

function forgotPassword()
{
    //go to the forgot password page
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
            $errorMsg = "L'email que vous souhaitez utilis?? est d??j?? occup?? par un autre compte";
        } else {
            //set phone
            if (empty($changeData['phone'])) {
                $phone = $_SESSION['phoneNumber'];
            } else {
                $phone = $changeData['phone'];
            }
            //check if phone is already used
            $checking = getUserInfoByPhone($phone);
            if (!empty($checking) && strcmp($phone, $_SESSION['phoneNumber']) !== 0) {
                $errorMsg = "Le num??ro de tel que vous souhaitez utilis?? est d??j?? occup?? par un autre compte";
            } else {
                //set password
                if (!empty($changeData['newPassword'])) {
                    if (strcmp($changeData['newPassword'], $changeData['passwordConfirm']) == 0) {
                        $psw = $changeData['newPassword'];
                    } else {
                        $psw = $changeData['password'];
                        $errorMsg = "Le nouveau mot de passe ?? mal ??t?? tap??";
                    }
                } else {
                    $psw = $changeData['password'];
                }
                $id = sessionId();
                //changeUsersInfos($email, $phone, $psw, $id);
                $successMsg = "Les informations ont bien ??t?? chang??es";
            }
        }
    } else {
        $errorMsg = "Le mot de passe actuel est erron??.";
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
        $errorForgot = "Oups... Veillez ?? remplir le formulaire";
        require "view/forgot_password.php";
    }
}

function changeRegister()
{
    //go to the change account's datas page
    $errorMsg = "";
    $successMsg = "";
    require "view/Change-infos.php";
}

function subNewsLetter(){
    //function to subscribe to the newsletter
    require_once "model/model.php";
    subscribe();
    header_remove();
    header("Location: /home");
}

function unSubNewsLetter(){
    //function to subscribe to the newsletter
    require_once "model/model.php";
    unSubscribe();
    header_remove();
    header("Location: /home");
}

function sendEventNewsletter($eventName, $imageName, $eventId){
       //Send an email when a new event is register
    //encode image to base 64
    $img = file_get_contents($imageName);
    $img64 = base64_encode($img);
    
    require_once "model/model.php";
    $userSub = checkSub();


    require_once "PHPMailer/PHPMailerAutoload.php";
    //set mailer datas
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

    foreach ($userSub as $row){
        $mail->addAddress($row['eMail']);
    }

    $mail->Subject = ("Un nouvel ??v??nement vous attends!");
    $mail->Body = "L'??v??nement $eventName vient d'??tre ajouter ?? la liste. n'h??sitez pas ?? consulter la page : <br><br>
                   <a href=\"http://" . $_SERVER["HTTP_HOST"] ."/event?id=$eventId\"><img style=\"object-fit: contain; width: 1/3;\" src=\"data:image/png;base64,$img64\" alt=\"clickez ici\"></a> <br><br>
                   <a href=\"http://" . $_SERVER["HTTP_HOST"] ."/unSubNewsLetter\">Me d??sinscrire de la newsletter</a>";
    $mail->IsHTML(true);

    $mail->send();

    header("Location: /home");
}

function mailBuy($buyedId, $imageName, $name, $userMail, $eventId){

           //Send an email when a new event is register
    //encode image to base 64
    $img = file_get_contents($imageName);
    $img64 = base64_encode($img);
    
    require_once "model/model.php";
    $userSub = checkSub();


    require_once "PHPMailer/PHPMailerAutoload.php";
    //set mailer datas
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
    $mail->addAddress($userMail);
    $mail->Subject = ("Un nouvel ??v??nement vous attends!");
    $mail->Body = "Merci !<br> Vous venez d'acheter un ticket pour aller a l'??v??nement $name. <br><br> Votre ticket : $buyedId <br><br><br>
                   <a href=\"http://" . $_SERVER["HTTP_HOST"] ."/event?id=$eventId\"><img src=\"data:image/png;base64,$img64\" alt=\"clickez ici\"></a> <br><br>";
    $mail->IsHTML(true);

    $mail->send();

    header("Location: /home");
}