<?php
include('connect.php');

$card_id = $_POST['id'];

$query = "delete from cards where card_id='$card_id'";
mysqli_query($connection, $query);