<?php
require('../utilities/initialize.php');

if (isset($_GET['logout']) == true){
    session_destroy();
    header('Location: ' . $app_path);
}
    
if (!isset($_SESSION['user_id']))
    header('Location: ' . $app_path . 'account');

if (isset($_POST['action'])) { $action = $_POST['action'];}

else
    $action = "decks_view";

switch($action){
    
    case "decks_view":
        if (valid_user_id($_SESSION['user_id'])){
            include('decks.php');
            break;   
        }
        else
            header('Location: ' . $app_path . 'account');

    case "cards_view":
        $_SESSION['deck_id'] = filter_input(INPUT_POST, 'deck_id');
        $_SESSION['deck_name'] = filter_input(INPUT_POST, 'deck_name');
        header('Location: ' . $app_path . 'cards');
        break;

    case "add_deck":
        $user_id = filter_input(INPUT_POST, 'user_id');
        $name = filter_input(INPUT_POST, 'name');

        insert_deck($user_id, $name);
        header('Location: ' . $app_path . 'decks');
        break;
}