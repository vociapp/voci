<?php
include('connect.php');
$deck_id = $_POST['deck_id'];
$query1 = "delete from cards where deck_id='$deck_id'";
$query2 = "delete from decks where deck_id='$deck_id'";
mysqli_query($connection, $query1);
mysqli_query($connection, $query2);