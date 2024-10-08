<!DOCTYPE html>
<html>
<head>
    <title>Age Restriction</title>
    <style>
        .error {
            color: red;
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

        if (empty($name)) {
            $nameError = 'Name is required.';
        }

        if (!filter_var($age, FILTER_VALIDATE_INT) || $age < 18) {
            $ageError = 'Hello, you are not authorized to visit the site.';
        }

        if (empty($nameError) && empty($ageError)) {
            echo "Name: " . $name . "<br>";
            echo "Age: " . $age . "<br>";
        }
    }
    ?>

    <form action="" method="post" id="ageForm">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
            <div id="nameError" class="error"><?php echo $nameError; ?></div>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>" required>
            <div id="ageError" class="error"><?php echo $ageError; ?></div>
        </div>
        <input type="submit" value="Submit">
    </form>
</body>
</html>