<?php
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');


    if (empty($email) || empty($password) || empty($fname) || empty($lname)){
        display_error("Please enter all fields.");
        exit;
    }

    //Check if email already exists
    if (user_exists($email))
        display_error("A user is already using this email");

    //Check if password is appropriate

    //Check if email is appropriate

    insert_user($fname, $lname, $email, $password);
    exit;
    
