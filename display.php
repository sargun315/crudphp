<?php
session_start();
//echo "welcome".$_SESSION["user_name"];
$userp=$_SESSION["user_name"];
if($userp==true){

}
else{
    header('Location:login1.php');
}
?>
<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CRUD Operation</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container">

    <button class="btn btn-primary my-5">
        <a href="login.php" class="text-light text-decoration-none">
            Add Users
        </a>
    </button>


    <table class="table table-bordered">

        <thead>

            <tr>

                <th>ID</th>

                <th>Name</th>

                <th>Email</th>

                <th>Mobile</th>

                <th>Password</th>

                <th>Operation</th>

            </tr>

        </thead>


        <tbody>

        <?php

        $sql = "SELECT * FROM users";

        $result = mysqli_query($conn, $sql);


        if (!$result) {

            die("Database Error: " . mysqli_error($conn));

        }


        while ($row = mysqli_fetch_assoc($result)) {

            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $password = $row['password'];

        ?>

            <tr>

                <td>
                    <?php echo $id; ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($name); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($email); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($mobile); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($password); ?>
                </td>

                <td>

                    <!-- UPDATE BUTTON -->

                    <a
                        href="update.php?updateid=<?php echo $id; ?>"
                        class="btn btn-primary"
                    >
                        Update
                    </a>


                    <!-- DELETE BUTTON -->

                    <a
                        href="delete.php?deleteid=<?php echo $id; ?>"
                        class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this user?');"
                    >
                        Delete
                    </a>

                </td>

            </tr>

        <?php

        }

        ?>

        </tbody>

    </table>
    <a href="logout.php"> <input type="submit" name="" value="Logout" style="background-color: blue; color: whitesmoke; height: 50px; width: 100px; cursor: pointer;"></a>

</div>

</body>

</html>
