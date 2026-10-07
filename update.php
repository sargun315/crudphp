
<?php

include "db.php";
session_start();
$userp=$_SESSION["user_name"];
if($userp==true){

}
else{
    header('Location:login1.php');
}

/* =========================
   STEP 1: Get ID from URL
   ========================= */

if (!isset($_GET['updateid']) || empty($_GET['updateid'])) {
    die("");
}

$id = (int) $_GET['updateid'];


/* =========================
   STEP 2: Get existing user
   ========================= */

$sql = "SELECT * FROM users WHERE id = $id";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database Error: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 0) {
    die("User not found.");
}

$row = mysqli_fetch_assoc($result);


/* =========================
   STEP 3: Update data
   ========================= */

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "UPDATE users SET
            name = '$name',
            email = '$email',
            mobile = '$mobile',
            password = '$password'
            WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {

        echo "<script>
                alert('Data updated successfully');
                window.location.href = 'display.php';
              </script>";

        exit();

    } else {

        die("Update Error: " . mysqli_error($conn));
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update User</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
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
            background: green;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: darkgreen;
        }

    </style>

</head>

<body>

<div class="container">

    <h2>Update User</h2>

    <form action="update.php?updateid=<?php echo $id; ?>" method="POST">

        <label>Name</label>

        <input
            type="text"
            name="name"
            value="<?php echo htmlspecialchars($row['name']); ?>"
            required
        >


        <label>Email</label>

        <input
            type="email"
            name="email"
            value="<?php echo htmlspecialchars($row['email']); ?>"
            required
        >


        <label>Mobile</label>

        <input
            type="text"
            name="mobile"
            value="<?php echo htmlspecialchars($row['mobile']); ?>"
            required
        >


        <label>Password</label>

        <input
            type="text"
            name="password"
            value="<?php echo htmlspecialchars($row['password']); ?>"
            required
        >


        <button type="submit" name="submit">
            Update
        </button>

    </form>

</div>

</body>

</html>
