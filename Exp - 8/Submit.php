<?php
session_start();

// Check if the name field is set in the POST request
if (isset($_POST['name'])) {
    // Sanitize the name input to prevent XSS attacks
    $name = htmlspecialchars($_POST['name']);
    $_SESSION['name'] = $name;
    $_SESSION['start'] = time();

    // Redirect to the welcome page
    header('Location: welcome.php');
    exit();
} else {
    // Redirect back to the form if the name field is not set
    header('Location: index.html');
    exit();
}
?>
