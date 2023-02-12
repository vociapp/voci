<?php
$email = trim(htmlspecialchars(filter_input(INPUT_POST, 'email')));
$password = trim(htmlspecialchars(filter_input(INPUT_POST, 'password')));

$errors = array();

//VALIDATION

//Validate email
array_push ($errors, validate_input($email, 320, "email"));
array_push ($errors, email_validation($email));
//Validate password
array_push ($errors, validate_input($password, 50, "Password"));

if (!empty($errors[0]) || !empty($errors[1]) || !empty($errors[2]))
    display_errors($errors);


//FORMATTING

$email_processed = email_processing($email);
$password_hashed = password_hash($password, PASSWORD_BCRYPT, ['const' => 10]);

// Check email and password in database
if (valid_login($email_processed, $password)) {
    $_SESSION['user_id'] = get_user_id($email_processed);
    $_SESSION['user_name'] = get_user_name($email_processed);
    header('Location: ' . $app_path . 'decks');
    exit;
} 
else {
    display_errors('Login failed. Invalid email or password.');
    exit;
}
exit();
?>