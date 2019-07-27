<!-- Connect to database -->
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    $db = 'hackathon';

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_select_db($conn, $db);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Name goes here</title>
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

        <form action="./explore_results.php" method="post">
            <label for="search">SEARCH</label><br>
            <input id="search" type="text" name="title" placeholder="Is it ok to..."><br>

            <label for="location">LOCATION</label><br>
            <input list="location" name="country" placeholder="Country">
            <datalist id="location">
                <!-- Get all countries from DB -->
                <?php
                    $sql = 'SELECT * FROM location';
                    $result = mysqli_query($conn, $sql);

                    while($country = mysqli_fetch_row($result)) {
                        printf ("<option value=\"%s\">", $country[1]);
                    }
                    mysqli_close($conn);
                ?>
            </datalist><br>

            <label for="tags">TAGS</label><br>
            <input id="tags" type="text" name="tags" placeholder="#work, #shop, ..."><br>

            <input type="submit" value="Search">
        </form>
    </body>
</html>
