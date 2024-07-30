<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Restriction</title>
    <style>
        form {
            max-width: 400px;
            margin: 10% auto;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        form .form-group {
            margin-bottom: 1rem;
        }
        form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        form input[type="text"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body>
    <?php
    $name = $age = "";
    $nameError = $ageError = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
        $age = htmlspecialchars(trim($_POST['age']), ENT_QUOTES, 'UTF-8');

        $errors = [];

        // Validate name
        if (empty($name)) {
            $nameError = 'Name is required.';
            $errors['name'] = $nameError;
        }

        // Validate age and ensure it is an integer greater than or equal to 18
        if (!filter_var($age, FILTER_VALIDATE_INT) || $age < 18) {
            $ageError = 'You must be at least 18 years old.';
            $errors['age'] = $ageError;
        }

        if (empty($errors)) {
            echo "<h2>Submission Successful!</h2>";
            echo "<p>Name: " . $name . "</p>";
            echo "<p>Age: " . $age . "</p>";
            exit();
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="ageForm">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
            <div id="nameError" class="error"><?php echo $nameError; ?></div>
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" id="age" name="age" value="<?php echo $age; ?>" required>
            <div id="ageError" class="error"><?php echo $ageError; ?></div>
        </div>

        <input type="submit" value="Submit">
    </form>
</body>
</html>