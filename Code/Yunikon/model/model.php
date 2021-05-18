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

function getUserInfo($userEmailAddress)
{
    $result = false;
    $strSeparator = '\'';
    $loginQuery = 'SELECT * FROM users WHERE eMail = ' . $strSeparator . $userEmailAddress . $strSeparator;

    require_once 'dbConnector.php';
    $queryResult = executeQuerySelect($loginQuery);
    
    return $queryResult;
}