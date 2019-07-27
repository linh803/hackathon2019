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

        <h1>CONTRIBUTE</h1>

        <form action="./peak.php" method="post">
            <!-- Retain data when returning from peak.php -->
            <label for="location">LOCATION</label><br>
            <?php
                if(empty($_POST['country'])) {
                    printf('<input list="location" name="country" placeholder="Country"><br>');
                } else {
                    printf('<input list="location" name="country" value="%s"><br>', $_POST['country']);
                }
            ?>
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
            <?php
                if(empty($_POST['tags'])) {
                    printf('<input id="tags" type="text" name="tags" placeholder="#work, #shop, ..."><br>');
                } else {
                    printf('<input id="tags" type="text" name="tags" value="%s"><br>', $_POST['tags']);
                }
            ?>

            <label for="title">TITLE</label><br>
            <?php
                if(empty($_POST['title'])) {
                    printf('<input id="title" type="text" name="title" placeholder="Title" maxlength="200"><br>');
                } else {
                    printf('<input id="title" type="text" name="title" value="%s" maxlength="20"><br>', $_POST['title']);
                }
            ?>

            <label for="description">DESCRIPTION</label><br>
            <?php
                if(empty($_POST['description'])) {
                    printf('<textarea id="description" name="description" placeholder="Tell us more..." maxlength="250"></textarea><br>');
                } else {
                    printf('<textarea id="description" name="description" maxlength="250">%s</textarea><br>', $_POST['description']);
                }
            ?>

            <input type="submit" value="Post">
        </form>
    </body>
</html>
