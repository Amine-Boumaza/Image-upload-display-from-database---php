<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .card {
            display: inline-block;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            box-shadow: 0 0 5px #ddd;
            max-width: 33%;
        }

        .card img {
            max-width: 100%;
            height: auto;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <?php
    // Connect to database
    $conn = mysqli_connect("127.0.0.1", "root", "", "client");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch images from database
    $sql = "SELECT * FROM images";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $image_id = $row['id'];
            $image_url = $row['url'];
            $image_name = $row['name'];
            $image_story = $row['story'];
    ?>
            <div class="card">
                <img src="<?php echo $image_url; ?>" alt="<?php echo $image_name; ?>">
                <div class="caption">
                    <h4>
                        <?php echo $image_name; ?>
                    </h4>
                    <p>
                        <?php echo $image_story; ?>
                    </p>
                </div>
            </div>
    <?php
        }
    } else {
        echo "No images found.";
    }

    // Close database connection
    mysqli_close($conn);
    ?>
    <button href></button>
    <a href="form.html">Add Image</a>
</body>

</html>