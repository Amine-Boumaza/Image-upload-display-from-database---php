<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .clients-pics {
            width: 90%;
            margin: auto;
            text-align: center;
        }

        .img-row {
            display: flex;
            justify-content: space-evenly;
        }


        .card {
            margin: 10px;
            padding: 10px;
            /* box-shadow: 0 0 5px #ddd; */
            flex-basis: 30%;
            position: relative;
        }

        .card img {
            width: 100%;
            height: auto;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <?php
    // Connect to database
    include "db_connect.php";
    // Fetch images from database
    $sql = "SELECT * FROM images";
    $result = mysqli_query($conn, $sql);
    $images = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $images[] = $row;
    ?>
            <div class='clients-pics'>


                <div class="img-row">
                    <div class='card'>
                        <img src='<?php echo $images[0]["url"]; ?>' alt='<?php echo $images[0]["name"]; ?>'>
                        <div class='caption'>
                            <h4><?php echo $images[0]["name"]; ?></h4>
                            <p><?php echo $images[0]["story"]; ?></p>
                        </div>
                    </div>
                    <div class='card'>
                        <img src='<?php echo $images[1]["url"]; ?>' alt='<?php echo $images[1]["name"]; ?>'>
                        <div class='caption'>
                            <h4><?php echo $images[1]["name"]; ?></h4>
                            <p><?php echo $images[1]["story"]; ?></p>
                        </div>
                    </div>
                    <div class='card'>
                        <img src='<?php echo $images[2]["url"]; ?>' alt='<?php echo $images[2]["name"]; ?>'>
                        <div class='caption'>
                            <h4><?php echo $images[2]["name"]; ?></h4>
                            <p><?php echo $images[2]["story"]; ?></p>
                        </div>
                    </div>
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