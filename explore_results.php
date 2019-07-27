<!-- Connect to database -->
<?php
    include 'db.php';
    $conn = db_connect();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Explore</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap" rel="stylesheet">
        <link href="./fontawesome-free-5.9.0-web/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="./nav.css">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="./explore.css">
    </head>

    <body id="background">
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

        <div class="col-sm-12">
            <form class="form-inline" action="./explore_results.php" method="post">
                <div class="form-group">
                    <i class="fa fa-user icon"></i>
                    <input class="form-control e-input" id="search" type="text" name="title" placeholder="Is it ok to..."><br>
                </div>

                <div class="form-group">
                    <input class="form-control e-input" list="location" name='country' placeholder="Country">
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
                </div>

                <span class="float-right">
                    <button type="submit" class="btn custom-button e-button">Search</button>
                </span>
            </form>
        </div>

        <div class="container">
            <!-- Retrieve card results -->
            <?php
                $sql = sprintf('SELECT * FROM etiquette JOIN location ON etiquette.location = location.id WHERE title LIKE \'%%%s%%\' AND title LIKE \'%%%s%%\' AND country LIKE \'%%%s%%\'', $_POST['title'], $_POST['tags'], $_POST['country']);
                $result = mysqli_query($conn, $sql);

                while($rules = mysqli_fetch_array($result)) {
                    printf("<div class=\"col-sm-12 e-card\">");
                    printf("<div class=\"card custom-e-card\">");
                    printf("<div class=\"card-body\">");
                    printf ("<p class=\"country\">%s</p>", $rules['country']);
                    printf ("<h2>%s</h2>", $rules['title']);
                    printf ("<p class=\"description\">%s</p>", $rules['description']);
                    printf ("<p class=\"tags\">%s</p>", $rules['tag']);
                    printf ("<img src=\"./icons/up-arrow.png\" alt=\"up arrow\"><span class=\"votes\">%d</span>", $rules['likes']);
                    printf ("<img src=\"./icons/down-arrow.png\" alt=\"down arrow\"><span class=\"votes\">%d</span>", $rules['dislikes']);
                    printf("</div>");
                    printf("</div>");
                    printf("</div>");
                }
            ?>
        </div>
    </body>
</html>
