<?php

// Account Queries

function insert_user($fname, $lname, $email, $password)
{
    global $db;
    $query = "insert into users
            (fname, lname, email, password) values 
            (:fname, :lname, :email, :password)";
    $statement = $db->prepare($query);

    $statement->execute([
        'fname' => $fname,
        'lname' => $lname,
        'email' => $email,
        'password' => $password
    ]);
    $statement->closeCursor();
}

function valid_login($email, $password)
{
    global $db;
    $query = "select * from users where 
            email = :email and 
            password = :password";
    $statement = $db->prepare($query);
    $statement->execute([
        'email' => $email,
        'password' => $password
    ]);
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

function valid_user_id($user_id)
{
    global $db;
    $query = "select * from users where 
            user_id = :user_id";
    $statement = $db->prepare($query);
    $statement->execute([
        'user_id' => $user_id
    ]);
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

function get_user_id($email)
{
    global $db;
    $query = "select * from users where 
            email = :email";
    $statement = $db->prepare($query);
    $statement->execute([
        'email' => $email
    ]);
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result['user_id'];
}

function get_user_name($email)
{
    global $db;
    $query = "select * from users where 
            email = :email";
    $statement = $db->prepare($query);
    $statement->execute([
        'email' => $email
    ]);
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result['fname'];
}

function user_exists($email)
{
    global $db;
    $query = "select * from users where email = :email";
    $statement = $db->prepare($query);
    $statement->execute([
        'email' => $email
    ]);
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

function password_invalid($password)
{
    global $db;
    $valid = (strlen($password) < 6);
    return $valid;
}

// Deck Queries

function get_decks($user_id)
{
    global $db;
    $query = "select * from decks where user_id = :user_id";
    $statement = $db->prepare($query);
    $statement->execute([
        'user_id' => $user_id
    ]);
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function insert_deck($user_id, $name)
{
    global $db;
    $query = "insert into decks
            (user_id, name) values 
            (:user_id, :name)";
    $statement = $db->prepare($query);
    $statement->execute([
        'user_id' => $user_id,
        'name' => $name
    ]);
    $statement->closeCursor();
}

function delete_deck($deck_id)
{
    global $db;

    // Delete the deck
    $query = "delete from decks where deck_id = :deck_id";
    $statement = $db->prepare($query);
    $statement->execute([
        'deck_id' => $deck_id
    ]);
    $statement->closeCursor();

    // Delete all cards associated with the deck

    global $db;
    $query = "delete from cards where deck_id = :deck_id";
    $statement = $db->prepare($query);
    $statement->execute([
        'deck_id' => $deck_id
    ]);
    $statement->closeCursor();
}

function rename_deck($deck_id, $name)
{

    global $db;
    $query = "update decks set name = :name where deck_id = :deck_id";
    $statement = $db->prepare($query);
    $statement->execute([
        'deck_id' => $deck_id,
        'name' => $name
    ]);
    $statement->closeCursor();
}

// Card Queries

function insert_card($deck_id, $front, $back)
{
    global $db;
    $query = "insert into cards
            (deck_id, front, back) values 
            (:deck_id, :front, :back)";
    $statement = $db->prepare($query);
    $statement->execute([
        'front' => $front,
        'back' => $back,
        'deck_id' => $deck_id
    ]);
    $statement->closeCursor();
}

function delete_card($card_id)
{
    global $db;
    $query = "delete from cards where card_id = :card_id";
    $statement = $db->prepare($query);
    $statement->execute([
        'card_id' => $card_id
    ]);
    $statement->closeCursor();
}

function get_cards($deck_id)
{
    global $db;
    $query = "select * from cards where deck_id = :deck_id";
    $statement = $db->prepare($query);
    $statement->execute([
        'deck_id' => $deck_id
    ]);
    $result = $statement->fetchAll();
    return $result;
}