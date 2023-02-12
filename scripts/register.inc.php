<?php
$email = trim(htmlspecialchars(filter_input(INPUT_POST, 'email')));
$password = trim(htmlspecialchars(filter_input(INPUT_POST, 'password')));
$fname = trim(htmlspecialchars(filter_input(INPUT_POST, 'fname')));
$lname = trim(htmlspecialchars(filter_input(INPUT_POST, 'lname')));

$errors = array();

// VALIDATING DATA

//First name
array_push($errors, validate_input($fname, 50, "First name"));
//Last name
array_push($errors, validate_input($lname, 50, "Last name"));
//Email
array_push($errors, validate_input($email, 320, "email"));
array_push($errors, email_validation($email));
//Password
array_push($errors, validate_input($password, 50, "Password"));
array_push($errors, password_validation($password));

if (!empty($errors[0] || !empty($errors[1]) || !empty($errors[2]) || !empty($errors[3]) || !empty($errors[4]) || !empty($errors[5]) || !empty($errors[6])))
    display_errors($errors);

else{
    // PROCESS EMAIL AND PASSWORD
    $email_processed = email_processing($email);
    $password_hashed = password_hash($password, PASSWORD_BCRYPT, ['const' => 10]);

    //Check if email already exists
    if (user_exists($email_processed)){
        display_errors("A user is already using this email");
    }
    else
        insert_user($fname, $lname, $email_processed, $password_hashed);
}