<?php
require_once 'includes/config.php';

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to home page with a success message
header('Location: index.php');
exit();
