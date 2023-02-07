<?php
$email = $_POST['email'];
$password = $_POST['password'];

if (isset($email) && isset($password)){
    //Check if this username exists
    $query = "select * from users where email='$email' and password='$password'";
    $result = mysqli_query($_SESSION['connection'], $query);

    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['fname'] = $row['fname'];
    }
}
