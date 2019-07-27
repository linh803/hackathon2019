<!DOCTYPE html>
<html>
    <head>
        <title>Name goes here</title>
        <meta charset="utf-8">
    </head>

    <body>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="./index.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./explore.html">Explore</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./contribute.html">Contribute</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./rate.html">Rate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./signup.html">Sign In</a>
            </li>
        </ul>

        <!--TODO: add action page-->
        <form action="" method="post">
            <label for="search">SEARCH</label><br>
            <input id="search" type="text" name="search" placeholder="Is it ok to..."><br>

            <label for="location">LOCATION</label><br>
            <input list="location" placeholder="City">
            <datalist id="location">
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
                    // echo "Connected successfully <br>";

                    // Query: mysqli_query($conn, QUERY);
                    mysqli_select_db($conn, $db);
                    $sql = 'SELECT * FROM location';
                    $result = mysqli_query($conn, $sql);

                    while($country = mysqli_fetch_row($result)) {
                        printf ("<option value=\"%s\">", $country[1]);
                    }
                    mysqli_close($conn);
                ?>
                <!-- <option value="City"> -->
                <!--TODO: print options using js or php-->
            </datalist><br>

            <label for="tags">TAGS</label><br>
            <input id="tags" type="text" name="tags" placeholder="#work, #shop, ..."><br>

            <input type="submit" value="Post">
        </form>
    </body>
</html>
