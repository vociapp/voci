<?php
$user_id = $_POST['user_id'];
$deck_name = $_POST['name'];
echo 'Reached';

if (!empty($deck_name) && !empty($user_id)){
    $query = "insert into decks(user_id, name) values('$user_id','$deck_name')";
    mysqli_query($_SESSION['connection'], $query);
    echo 'Successful connection and query';
}
else
    echo "Please enter all fields";
?>