<?php

function RegisterUser($userEmailAddress, $userPsw, $firstname, $lastname, $phone)
{
    //Add user in the db
    $userHashPsw = password_hash("$userPsw", PASSWORD_DEFAULT);
    $register = "INSERT INTO users (eMail, password, phoneNumber, name, lastname) VALUES ('$userEmailAddress', '$userHashPsw', '$phone', '$firstname', '$lastname')";
    require_once 'dbconnector.php';
    
    $registerResult = executeQueryIUD($register);
    return $registerResult;
}

function isLoginCorrect($userEmailAddress, $userPsw)
{
    //check if the login match 
    $result = false;
    $strSeparator = '\'';
    $loginQuery = 'SELECT * FROM users WHERE eMail = ' . $strSeparator . $userEmailAddress . $strSeparator;

    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($loginQuery);
    if (count($queryResult) == 1) {
        $userHashPsw = $queryResult[0]['password'];
        if (password_verify($userPsw, $userHashPsw) == true) {
            $result = true;
        } else {
            $result = false;
        }
    } else {
        $result = false;
    }
    return $result;
}

function decrement($eventId, $userId){
    //return tickets without owner, with the lower id and identified by event id    
    $eventQuery = 'SELECT * FROM tickets WHERE id = (SELECT MIN(id) FROM tickets WHERE Users_id IS NULL AND Event_id =' . $eventId . ')';
    require_once 'dbConnector.php';
    $remainsTicket = executeQuerySelect($eventQuery);

    $remainsTicketId = $remainsTicket[0]['id'];
    $strSeparator = '\'';
    //Use the lower id of remaining tickets to identified it and write the current user's id to give him the ticket
    $updateTicket = 'UPDATE tickets SET Users_id = ' . $strSeparator . $userId . $strSeparator .' WHERE id = ' . $strSeparator . $remainsTicketId . $strSeparator;

    require_once 'dbConnector.php';
    $queryResult = executeQueryIUD($updateTicket);
}

function ticketsRemaining($eventId){
    //return every tickets without owner
    $eventQuery = 'SELECT * FROM tickets WHERE Users_id IS NULL  AND event_id =' . $eventId;
    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($eventQuery);

    return $queryResult;
}

function registerTicket($price, $eventId){
    //create tickets in db
    $register = "INSERT INTO tickets (price, Event_id) VALUES ('$price', '$eventId')";
    require_once 'dbConnector.php';
    $queryResult = executeQueryIUD($register);

    return $queryResult;
}

function showEvent()
{
    //get every events
    $eventQuery = 'SELECT * FROM events';
    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($eventQuery);

    return $queryResult;
}

function getNextEvent(){
    //get the date of the next event 
    $loginQuery = 'SELECT MIN(startingDate) AS next_event  FROM events WHERE startingDate > CURRENT_DATE';
    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($loginQuery);

    return $queryResult;
}

function getUserInfoByPhone($phone)
{
    //return every datas of the user's identified by his phone number
    $strSeparator = '\'';
    $loginQuery = 'SELECT * FROM users WHERE phoneNumber = ' . $strSeparator . $phone . $strSeparator;
    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($loginQuery);

    return $queryResult;
}

function getUserInfo($userEmailAddress)
{
    //return every datas of the user's identified by email address
    $result = false;
    $strSeparator = '\'';
    $loginQuery = 'SELECT * FROM users WHERE eMail = ' . $strSeparator . $userEmailAddress . $strSeparator;
    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($loginQuery);

    return $queryResult;
}

function getUserExhibitor($userEmailAddress)
{
    //check if the current user is an exhibitor
    $result = false;
    $strSeparator = '\'';
    $loginQuery = 'SELECT exhibitor FROM users WHERE eMail = ' . $strSeparator . $userEmailAddress . $strSeparator;
    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($loginQuery);

    return $queryResult;
}

function registerEvent($name, $starting, $ending, $location, $description, $image)
{
    //add new event in db
    $user = getUserInfo($_SESSION['userEmailAddress']);
    $userId = $user[0]['id'];
    $register = "INSERT INTO events (name, startingDate, endingDate, location, description, image, Users_id) VALUES ('$name', '$starting', '$ending', '$location', '$description', '$image', '$userId')";
    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($register);

    return $queryResult;
}

function getEventId($name){
    //return the id of event identified by name
    $strSeparator = '\'';
    $eventQuery = 'SELECT * FROM events WHERE name LIKE ' . $strSeparator . $name . $strSeparator;
    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($eventQuery);

    return $queryResult;
}

function getEventById($id){
    //return the datas of event identified by id
    $eventQuery = 'SELECT * FROM events WHERE id = ' . $id;
    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($eventQuery);

    return $queryResult;
}

function getEventByUserId($id){
    //return the datas of event identified by the user id
    $eventQuery = 'SELECT * FROM events WHERE Users_id = ' . $id;
    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($eventQuery);

    return $queryResult;
}

function updatePsw($userInfo){
    //change the password
    $newPassword = $userInfo['newPassword'];
    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
    $userEmailAddress = $userInfo['email'];

    $update = "UPDATE users SET password = '$newPasswordHash' WHERE eMail = '$userEmailAddress'";
    require_once 'dbconnector.php';
    $updateResult = executeQueryIUD($update);
    $_SESSION['token'] = '';
    return $updateResult;
}


function changeUsersInfos($mail, $phone, $psw, $id){
    //update user's datas
    $newPasswordHash = password_hash($psw, PASSWORD_DEFAULT);
    $update = "UPDATE users SET password = '$newPasswordHash',  phoneNumber = '$phone', eMail = '$mail' WHERE id = '$id'";
    require_once 'dbconnector.php';
    $updateResult = executeQueryIUD($update);
    return $updateResult;
}

function delEvent($eventId){
    //delete an event by id
    $register = "DELETE FROM events WHERE id = " . $eventId;
    require_once 'dbConnector.php';
    $queryResult = executeQueryIUD($register);

    return $queryResult;
    
}