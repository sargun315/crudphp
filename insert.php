<?php
include "db.php";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Password encryption
    #$password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, mobile, password)
            VALUES ('$name', '$email', '$mobile', '$password')";

    if (mysqli_query($conn, $sql)) {
        header('Location:display.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>