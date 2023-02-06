<?php
include("connect.php");

    $email = $_POST['email'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    if (!empty($email) && !empty($password) && !empty($fname) && !empty($lname)){

        $query = "insert into users(email, password, fname, lname) values ('$email', '$password', '$fname', '$lname')";
        mysqli_query($connection, $query);


        //TODO INSTANTIATE A "decks" TABLE

        include("voci.php");
        die;
    }
    else {
        echo "Please enter valid information!";
    }