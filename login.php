<?php
   include "db.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Form</title>
</head>

<body>

    <h2>User Registration Form</h2>

    <form action="insert.php" method="POST">

        <!-- ID -->
        <label for="id">ID:</label>
        <input type="number" id="id" name="id">
        <br><br>

        <!-- Name -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>

        <!-- Email -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <!-- Mobile -->
        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile" maxlength="15" required>
        <br><br>

        <!-- Password -->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <!-- Submit -->
        <input type="submit" name="submit" value="Submit">
        

        <!-- Reset -->
        <input type="reset" value="Reset">

    </form>

</body>
</html>

