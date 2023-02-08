<?php
    require_once('../utilities/initialize.php');

    // We check if the user is logged in
    if (!isset($_SESSION['user_id']))
        header('Location: ' . $app_path . 'account');

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
            header('Location' . $app_path . 'decks');
        case 'delete_card':
            $card_id = filter_input(INPUT_POST, 'card_id');
            delete_card($card_id);
            header('Location: ' . $app_path . 'cards');
            break;
        case 'add_card':
            $front = filter_input(INPUT_POST, 'front');
            $back = filter_input(INPUT_POST, 'back');
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
    }