<?php
require_once('../utilities/initialize.php');

    if (isset($_POST['action'])) { $action = $_POST['action'];} 
    else
        $action = "login_view";

    switch ($action) {

    case ($action == "login_view"):
        include('login.php');
        break;
    
    case ($action == "login"):
        include('../scripts/login.inc.php');
        break;

    // register action displays the register form
    case ($action == 'register_view'):
        include('register.php'); 
        break;

    // reg action checks, then inputs the registered information into database.
    case ($action == 'register'):
        include('../scripts/register.inc.php');
        header('Location: index.php');
        break;
    }