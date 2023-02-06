<?php
include('connect.php');
$deck_id = $_POST['deck_id'];
$name = $_POST['name'];

$query = "update decks set name='$name' where deck_id='$deck_id'";
mysqli_query($connection, $query);

include('decks.php');