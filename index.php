<!-- Connect to database -->
<?php
    include 'db.php';
    include 'navbar.php';
    $conn = db_connect();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Explore</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./nav.css">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="./background.css">
        <include
    </head>

    <body id="bckgrd" background="./images/home-background.png">
        <?php
            print_navbar();
        ?>

        <div id="main" class="container">
            <div class="row">
                <div class="col">
                    <div class="card custom-card">
                        <div class="card-body">
                            <form action="./explore_results.php" method="post">
                                <div class="form-group">
                                    <label class="form-label" for="search">SEARCH</label><br>
                                    <input id="search" class="form-control" type="text" name="title" placeholder="Is it ok to..."><br>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="location">LOCATION</label><br>
                                    <input class="form-control" list="location" name="country" placeholder="Country">
                                    <datalist id="location">
                                        <!-- Get all countries from DB -->
                                        <?php
                                            $sql = 'SELECT * FROM location ORDER BY country';
                                            $result = mysqli_query($conn, $sql);

                                            while($country = mysqli_fetch_row($result)) {
                                                printf ("<option value=\"%s\">", $country[1]);
                                            }
                                            mysqli_close($conn);
                                        ?>
                                    </datalist><br>
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
