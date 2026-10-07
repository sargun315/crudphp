<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login1 Page</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #0448c7;
}

.login-container {
    width: 350px;
    margin: 100px auto;
    padding: 30px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 0 10px gray;
}

h2 {
    text-align: center;
}

label {
    display: block;
    margin-top: 15px;
}

input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 10px;
    margin-top: 20px;
    background-color: #333;
    color: white;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #555;
}
    </style>
   </head>

<body>

<div class="login-container">

    <h2>Login</h2>

    <form action="#" method="POST">

        <label>Username</label>
        <input type="text" name="username" placeholder="Enter username" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Enter password" required>

        <button type="submit" name="login">Login</button>

    </form>

</div>

</body>
</html>

<?php
    include "db.php";

    if(isset($_POST["login"]))
    {
        $username=$_POST["username"];
        $password=$_POST["password"];
        $query="select*from users where email='$username' && password='$password' ";
        $result=mysqli_query($conn,$query);
        $data=mysqli_num_rows($result);
        //echo $data;
        if($data ==1){
            $_SESSION["user_name"] = $username;
            header("location:display.php");
        ?>
           //<meta http-equiv="refresh" content="0; url=http://localhost/crud/update.php">
        <?php
        } else{
            echo "login is failed";
        }



    }

  ?>  