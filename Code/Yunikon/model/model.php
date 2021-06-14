<?php

function RegisterUser($userEmailAddress, $userPsw, $firstname, $lastname, $phone)
{

    $userHashPsw = password_hash("$userPsw", PASSWORD_DEFAULT);
    $register = "INSERT INTO users (eMail, password, phoneNumber, name, lastname) VALUES ('$userEmailAddress', '$userHashPsw', '$phone', '$firstname', '$lastname')";
    require_once 'dbconnector.php';
    $registerResult = executeQueryIUD($register);
    return $registerResult;
}

function isLoginCorrect($userEmailAddress, $userPsw)
{
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

function showEvent()
{

    $eventQuery = 'SELECT * FROM events';

    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($eventQuery);

    return $queryResult;
}


function getUserInfo($userEmailAddress)
{
    $result = false;
    $strSeparator = '\'';
    $loginQuery = 'SELECT * FROM users WHERE eMail = ' . $strSeparator . $userEmailAddress . $strSeparator;

    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($loginQuery);

    return $queryResult;
}

function getUserExhibitor($userEmailAddress)
{
    $result = false;
    $strSeparator = '\'';
    $loginQuery = 'SELECT exhibitor FROM users WHERE eMail = ' . $strSeparator . $userEmailAddress . $strSeparator;

    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($loginQuery);

    return $queryResult;
}

function registerEvent($name, $starting, $ending, $location, $description, $image)
{


    $register = "INSERT INTO events (name, startingDate, endingDate, location, description, image) VALUES ('$name', '$starting', '$ending', '$location', '$description', '$image')";

    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($register);

    return $queryResult;
}

function getEventById($id){

    $strSeparator = '\'';
    $eventQuery = 'SELECT * FROM events WHERE id = ' . $id;

    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($eventQuery);

    return $queryResult;
}

function getTokens($userData)
{
    $data = file_get_contents("./model/token_forgot_password.json", true);
    $data = json_decode($data, true);

    foreach ($data as $row) {
        if ($row['email'] == $userData['email']) {
            if ($row['token'] == $userData['token']) {
                if ($row['used'] == 'FALSE') {
                    $reply = 'TRUE';
                } else {
                    $reply = 'FALSE';
                }
            } else {
                $reply = 'FALSE';
            }
        } else {
            $reply = 'FALSE';
        }
    }

    if($reply == 'TRUE'){
        $arr_index = array();
        foreach ($data as $key => $value) {
            if ($value['token'] == $userData['token']) {
                $arr_index[] = $key;
            }
        }
    
        foreach ($arr_index as $i) {
            $data[$i]['used'] = 'TRUE';
        }
    
        $data = array_values($data);
    
        $data = json_encode($data, JSON_PRETTY_PRINT);
    
        file_put_contents("./model/token_forgot_password.json", $data);
    }

    return $reply;
}

function updatePsw($userInfo){
    $newPassword = $userInfo['newPassword'];
    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
    $userEmailAddress = $userInfo['email'];
    $update = "UPDATE users SET password = '$newPasswordHash' WHERE eMail = '$userEmailAddress'";
    require_once 'dbconnector.php';
    $updateResult = executeQueryIUD($update);
    return $updateResult;
}

