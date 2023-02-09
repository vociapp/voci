<?php
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    if (empty($email) || empty($password)){
        display_error("Please enter all fields.");
        exit;
    }

    // Check email and password in database
    if (valid_login($email, $password)) {
        $_SESSION['user_id'] = get_user_id($email);
        $_SESSION['user_name'] = get_user_name($email);
        header('Location: ' . $app_path . 'decks');
        exit;
    } 
    else {
        display_error('Login failed. Invalid email or password.');
        exit;
    }
?>