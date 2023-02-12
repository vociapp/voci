<?php

function validate_input($string, $length, $name)
{
    if (empty($string))
        return $name . " cannot be empty";
    if (strlen($string) >= $length){
        return $name . " cannot be longer than " . $length . " characters."; 
    }
}

function email_processing($email)
{
    return(filter_var(trim(htmlspecialchars(($email))), FILTER_VALIDATE_EMAIL));
}

function email_validation($email)
{
    $result = (filter_var(trim(htmlspecialchars(($email))), FILTER_VALIDATE_EMAIL));
    if ($result === false)
        return "Invalid email.";
}

function password_validation($password)
{
    if (strlen($password) < 6)
        return "Password must be a minimum of 6 characters!";
}

function valid_login($email, $password)
{
    $user = retrieve_user($email);
    
    if ($user){
        if (password_verify($password, $user['password']))
            return true;
        else
            return false;
    }
    else{
        return false;
    }
}