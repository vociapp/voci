<?php
$deck_id = $_POST['deck_id'];
$front = $_POST['front'];
$back = $_POST['back'];

//If all fields were successfully passed through
if (!empty($deck_id) && !empty($front) && !empty($back)){
    $query = "insert into cards(deck_id, front, back) values ('$deck_id','$front','$back')";
    mysqli_query($connection, $query);
}
else {
    echo "Please enter all fields!";
}