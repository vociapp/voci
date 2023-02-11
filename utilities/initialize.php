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

// Get common code
require_once('utilities/connect.php');
require_once('utilities/db_queries.php');

// Define some common functions
function display_db_error($error_message) {
    global $app_path;
    include 'notifications/db_error.php';
    exit;
}

function display_error($error_message) {
    global $app_path;
    include 'notifications/error.php';
    exit;
}

function redirect($url) {
session_write_close();
    header("Location: " . $url);
    exit;
}

// Always include the header
include($doc_root . '/voci/views/header.php');
?>