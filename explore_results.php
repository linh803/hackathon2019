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
        <title>Explore</title>
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
            <input list="location" name='country' placeholder="Country">
            <datalist id="location">
                <!-- Retrieve possible countries -->
                <?php
                    $sql = 'SELECT * FROM location';
                    $result = mysqli_query($conn, $sql);

                    while($country = mysqli_fetch_row($result)) {
                        printf ("<option value=\"%s\">", $country[1]);
                    }
                ?>
            </datalist><br>

            <label for="tags">TAGS</label><br>
            <input id="tags" type="text" name="tags" placeholder="#work, #shop, ..."><br>
            <input type="submit" value="Search">
        </form>

        <!-- Retrieve card results -->
        <?php
            $sql = sprintf('SELECT * FROM etiquette JOIN location ON etiquette.location = location.id WHERE title LIKE \'%%%s%%\' AND title LIKE \'%%%s%%\' AND country LIKE \'%%%s%%\'', $_POST['title'], $_POST['tags'], $_POST['country']);
            $result = mysqli_query($conn, $sql);

            while($rules = mysqli_fetch_array($result)) {
                printf("<div>");
                printf ("<p class=\"country\">%s</p>", $rules['country']);
                printf ("<h2>%s</h2>", $rules['title']);
                printf ("<p class=\"description\">%s</p>", $rules['description']);
                printf ("<p class=\"tags\">%s</p>", $rules['tag']);
                printf ("<img src=\"./icons/up-arrow.png\" alt=\"up arrow\"><span class=\"votes\">%d</span>", $rules['likes']);
                printf ("<img src=\"./icons/down-arrow.png\" alt=\"down arrow\"><span class=\"votes\">%d</span>", $rules['dislikes']);
                printf("</div>");
            }
        ?>
    </body>
</html>
