<!-- Connect to database -->
<?php
    include 'db.php';
    $conn = db_connect();

    // Get count for ID for new data
    $sql = "SELECT COUNT(*) FROM etiquette;";
    $result = mysqli_query($conn, $sql);
    $count =  mysqli_fetch_row($result)[0];
    $sql = sprintf("SELECT id FROM location WHERE country = '%s';", $_POST['country']);
    $result = mysqli_query($conn, $sql);
    $id = mysqli_fetch_row($result)[0];

    // Insert data into DB
    $sql = sprintf("INSERT INTO `etiquette`(`id`, `title`, `description`, `likes`, `dislikes`, `location`, `tag`) VALUES (%s, '%s', '%s', 0, 0, %s, '%s');",
                  $count, $_POST['title'], $_POST['description'], $id, $_POST['tags']);
    mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Contribute</title>
        <meta charset="utf-8">
    </head>

    <body>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./explore.php">Explore</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./contribute.php">Contribute</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./rate.php">Rate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./signup.php">Sign In</a>
            </li>
        </ul>

        <h1>Thank You!</h1>
        <a href="./index.php"><button><img src="./images/home-icon.png">Home</button></a>
        <a href="./contribute.php"><button>Make another post<img src="./images/arrow-icon.png"></button></a>
    </body>
</html>
