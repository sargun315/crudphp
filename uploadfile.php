<?php
error_reporting(0);

if (isset($_POST["submit"])) {

    if ($_FILES["upload"]["error"] == 0) {

        $filename = $_FILES["upload"]["name"];
        $tmpname = $_FILES["upload"]["tmp_name"];

        $allowed = ["jpg", "jpeg", "png", "gif"];

        $extension = strtolower(
            pathinfo($filename, PATHINFO_EXTENSION)
        );

        if (in_array($extension, $allowed)) {

            $folder = "image/" . $filename;

            if (move_uploaded_file($tmpname, $folder)) {
                echo "Image uploaded successfully!";
            } else {
                echo "Upload failed!";
            }

        } else {
            echo "Only JPG, JPEG, PNG and GIF images are allowed.";
        }

    } else {
        echo "Please select an image.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<body>

<h2>Upload Image</h2>

<form action="" method="POST" enctype="multipart/form-data">

    <label>Select Image:</label>
    <input type="file" name="upload">

    <br><br>

    <input type="submit" name="submit" value="Upload">

</form>

</body>
</html>