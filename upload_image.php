<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $conn = mysqli_connect('127.0.0.1', 'root', '', 'client');
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Store uploaded image
    $name = $_POST['name'];
    $image_name = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_path = 'uploads/' . $image_name;
    move_uploaded_file($image_tmp_name, $image_path);
    $story = $_POST['story'];
    // Store image in database

    $sql = "INSERT INTO images (url, name, story) VALUES ('$image_path', '$name', '$story')";
    if (mysqli_query($conn, $sql)) {
        header('Location: test.php');
        exit();
    } else {
        echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
    }


    mysqli_close($conn);
}
