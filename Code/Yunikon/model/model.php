<?php

function RegisterUser($userEmailAddress, $userPsw, $firstname, $lastname, $phone)
{

    $userHashPsw = password_hash("$userPsw", PASSWORD_DEFAULT);
    $register = "INSERT INTO users (eMail, password, phoneNumber, name, lastname) VALUES ('$userEmailAddress', '$userHashPsw', '$phone', '$firstname', '$lastname')";
    require_once 'dbconnector.php';
    $registerResult = executeQueryIUD($register);
    return $registerResult;
}