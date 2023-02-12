<?php
require_once('../utilities/initialize.php');

if (isset($_GET['logout']) == true){
    session_destroy();
    header('Location: ' . $app_path);
    exit();
}

// We check if the user is logged in
if (!isset($_SESSION['user_id'])){
    header('Location: ' . $app_path . 'account');
    exit();
}

// Check action
if (isset($_POST['action'])) 
    $action = $_POST['action'];
else
    $action = "cards_view";

switch($action){
    case 'cards_view':
        $cards = get_cards($_SESSION['deck_id']);
        include('cards.php');
        break;
    case 'decks_view':
        header('Location: ' . $app_path . 'decks');
        break;
    case 'delete_card':
        $card_id = filter_input(INPUT_POST, 'card_id');
        delete_card($card_id);
        header('Location: ' . $app_path . 'cards');
        break;
    case 'add_card':
        $front = trim(htmlspecialchars(filter_input(INPUT_POST, 'front')));
        $back = trim(htmlspecialchars(filter_input(INPUT_POST, 'back')));

        if (!empty(validate_input($front, 1000, "Front"))){
            display_errors(validate_input($front, 1000, "Front of deck"));
            break;
        }

        if(!empty(validate_input($back, 1000, "Back"))){
            display_errors(validate_input($back, 1000, "Back of deck"));
            break;
        }

        insert_card($_SESSION['deck_id'], $front, $back);
        header('Location: ' . $app_path . 'cards');
        break;
    case 'study_deck':

        // Initialize
        if ($_POST['initiate'] == 1){
            $_SESSION['study_deck'] = get_cards($_SESSION['deck_id']);
            shuffle($_SESSION['study_deck']);
            $_SESSION['side'] = 0;
            $_SESSION['index'] = count($_SESSION['study_deck']) - 1;
        }

        // Flip the card each time
        $_SESSION['side'] = ($_SESSION['side'] == 0) ? 1 : 0;


        if ($_SESSION['index'] >= 0){
            include ("study_deck.php");
        }
        else
            include ("out_of_cards.php");
        break;
    case "rename_deck":
        $deck_id = trim(htmlspecialchars(filter_input(INPUT_POST, 'deck_id')));
        $name = trim(htmlspecialchars(filter_input(INPUT_POST, 'name')));
        
        if (!empty(validate_input($name, 100, "Decks"))){
            display_errors(validate_input($name, 100, "Decks"));
            break;
        }
        
        rename_deck($deck_id, $name);
        header('Location: ' . $app_path . 'cards');
        break;
    case "delete_deck":
        $deck_id = trim(htmlspecialchars(filter_input(INPUT_POST, 'deck_id')));
        delete_deck($deck_id);
        header('Location: ' . $app_path . 'decks');
        break;
    case "rename_deck_view":
        include('edit_deck.php');
        break;
}
exit();