<?php
session_start();

// Destroy the session to log the user out
session_destroy();

// Redirect to the form page
header('Location: index.html');
exit();
?>
