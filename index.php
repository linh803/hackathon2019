<!DOCTYPE html>
<html>
    <head>
        <title>Name goes here</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./nav.css">
        <link rel="stylesheet" href="./style.css">
    </head>

    <body background="./images/home-background.png">
        <nav class="navbar navbar-expand-md justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Explore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contribute.php">Contribute</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Rate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Sign In</a>
                </li>
            </ul>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card custom-card">
                        <div class="card-body">
                            <form action="./explore_results.php" method="post">
                                <div class="form-group">
                                    <label class="form-label" for="search">SEARCH</label><br>
                                    <input id="search" class="form-control" type="text" name="search" placeholder="Is it ok to..."><br>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="location">LOCATION</label><br>
                                    <input class="form-control" list="location" placeholder="City">
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
                                    </datalist><br>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="tags">TAGS</label><br>
                                    <input id="tags"  class="form-control" type="text" name="tags" placeholder="#work, #shop, ..."><br>
                                </div>

                                <span class="float-right">
                                    <button type="submit" class="btn custom-button">Search</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="col">
                <h1 class="heading1">IMPROVE YOUR CULTURAL INTELLIGENCE</h1>
            </div>
            </div>
        </div>
    </body>
</html>
