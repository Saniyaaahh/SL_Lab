<?php
session_start();

// Check if the session is active and the name is set
if (!isset($_SESSION['name'])) {
    header('Location: index.html');
    exit();
}

date_default_timezone_set('Asia/Kolkata');

// Retrieve the name and start time from the session
$name = $_SESSION['name'];
$starttime = $_SESSION['start'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        .container {
            max-width: 600px;
            margin: 5% auto;
            text-align: center;
        }
        .logout-form {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Session started at <?php echo date('h:i:s a', $starttime); ?></p>
        <p>Hello, <?php echo htmlspecialchars($name); ?>!</p>
        <form action="logout.php" method="post" class="logout-form">
            <input type="submit" value="Logout">
        </form>
    </div>
</body>
</html>
