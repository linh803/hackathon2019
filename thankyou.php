<!-- Connect to database -->
<?php
    include 'db.php';
    include 'navbar.php';
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
        <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./nav.css">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="./background.css">
    </head>

    <body id="bckgrd" background="./images/contribute-background.png">
        <?php
            print_navbar();
        ?>

        <div id="main" class="container">
            <div class="col">
                <h1 class="heading1">Thank You!</h1>
                <a href="./index.php"><button class="btn custom-button">Home</button></a>
                <a href="./contribute.php"><button class="btn custom-button">Make another post</button></a>
            </div>
        </div>
    </body>
</html>
