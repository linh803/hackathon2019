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
        <link href="./fontawesome-free-5.9.0-web/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="./nav.css">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="./explore.css">
    </head>

    <body id="background">
        <?php
            print_navbar();
        ?>

        <div class="container">
            <div class="col-sm-12">
                <form id='search' class="form-inline" action="./explore_results.php" method="post">
                    <div class="form-group">
                        <input class="form-control e-input" id="search" type="text" name="title" placeholder="Is it ok to..."><br>
                    </div>

                    <div class="form-group">
                        <input class="form-control e-input" list="location" name='country' placeholder="Country" onchange="countryChange();">
                        <datalist id="location">
                            <!-- Retrieve possible countries -->
                            <?php
                                $sql = 'SELECT * FROM location ORDER BY country';
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
                    <input type="hidden" name="tags" value="">
                </form>
            </div>

            <!-- Retrieve card results -->
            <?php
                if(!empty($_POST)) {
                    $sql = sprintf('SELECT * FROM etiquette JOIN location ON etiquette.location = location.id WHERE title LIKE \'%%%s%%\' AND country LIKE \'%%%s%%\'', $_POST['title'], $_POST['country']);
                    $result = mysqli_query($conn, $sql);

                    while($rules = mysqli_fetch_array($result)) {
                        printf("<div class=\"col-sm-12 e-card\">");
                        printf("<div class=\"card custom-e-card\">");
                        printf("<div class=\"card-body\">");
                        printf ("<p style=\"color: #138EAD\">%s</p>", $rules['country']);
                        printf ("<h2>%s</h2>", $rules['title']);
                        printf ("<p class=\"description\">%s</p>", $rules['description']);
                        printf ("<p style=\"color: #A0A0A0;\">%s</p>", $rules['tag']);
                        echo "<svg class='arrow-up'>";
                        echo file_get_contents("./fontawesome-free-5.9.0-web/svgs/solid/arrow-up.svg");
                        printf("</svg><span class=\"votes\"> %d </span>", $rules['likes']);
                        echo "<svg class='arrow-down'>";
                        echo file_get_contents("./fontawesome-free-5.9.0-web/svgs/solid/arrow-down.svg");
                        printf("</svg><span class=\"votes\"> %d</span>", $rules['dislikes']);
                        printf("</div>");
                        printf("</div>");
                        printf("</div>");
                    }
                }
            ?>
        </div>
    </body>
</html>

<!-- Script to change country on change -->
<script>
function countryChange(){
    document.getElementById('search').submit();
}
</script>