<?php
if (session_status() === PHP_SESSION_NONE) {session_start();}

$deck_id = $_POST['deck_id'];

if (!isset($deck_id)){
    echo "Error. Deck has not been set";
    include('decks.php');
}
else {

    //Let's generate a random queue of flashcards to be displayed
    $query = "select * from cards where deck_id='$deck_id'";
    $result = mysqli_query($_SESSION['connection'], $query);
    $length = mysqli_num_rows($result);

    $queue = array();

    for ($i = 0; $i < $length; $i++){
        array_push($queue, $i);
    }

    shuffle($queue);

    //Now let's instantiate two arrays, one front, and one back.
    $fronts = array();
    $backs = array();

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        array_push($fronts, $row['front']);
        array_push($backs, $row['back']);
    }

    //Store the variables, and move on.
    $_SESSION['queue'] = $queue;
    $_SESSION['fronts'] = $fronts;
    $_SESSION['backs'] = $backs;
    $_SESSION['side'] = 0;
    $_SESSION['deck_id'] = $deck_id;
}