<?php
// Start session to store user and cart data
if (session_status() === PHP_SESSION_NONE) {session_start();}
$_SESSION['user_name'] = "";
// Document root used to navigate site
$doc_root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT', FILTER_SANITIZE_STRING);

// Application path is used to navigate site
$uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
$dirs = explode('/', $uri);
$app_path = '/' . $dirs[1] . '/';

// Set the include path
set_include_path($doc_root . $app_path);

function display_db_error($error_message) {
    global $app_path;
    include 'notifications/db_error.php';
    exit;
}

function display_errors($error_messages) {
    global $app_path;
    include 'notifications/error.php';
    exit;
}

// Get common code
require_once('utilities/connect.php');
require_once('utilities/db_queries.php');
require_once('utilities/validation.php');

// Always include the header
include($doc_root . '/voci/views/header.php');
?>