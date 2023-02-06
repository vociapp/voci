<?php
    if (session_status() === PHP_SESSION_NONE) {session_start();}
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    if (!empty($email) && !empty($password) && !empty($fname) && !empty($lname)){
        $query = "insert into users(email, password, fname, lname) values ('$email', '$password', '$fname', '$lname')";
        mysqli_query($_SESSION['connection'], $query);
    }
    else {
        echo "Please enter valid information!";
    }