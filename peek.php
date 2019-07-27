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
        <link rel="stylesheet" href="./explore.css">
        <link rel="stylesheet" href="./contribute.css">
    </head>

    <body id="bckgrd" background="./images/contribute-background.png">
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

        <div id="main" class="container">
            <!-- <div class="row"> -->
                <h1 class="heading1 col-sm-12">Have a peek at your post</h1>


                <div>
                    <!-- Preview Card -->
                    <?php
                        printf("<div class=\"col-sm-12 e-card\">");
                        printf("<div class=\"card custom-e-card\">");
                        printf("<div class=\"card-body\">");
                        printf ("<p class=\"country\">%s</p>", $_POST['country']);
                        printf ("<h2>%s</h2>", $_POST['title']);
                        printf ("<p class=\"description\">%s</p>", $_POST['description']);
                        printf ("<p class=\"tags\">%s</p>", $_POST['tags']);
                        printf("</div>");
                        printf("</div>");
                        printf("</div>");
                    ?>
                </div>

                <div class="col">
                    <!-- Redirect to next page to add to DB -->
                    <form action="./thankyou.php" method="post">
                        <?php
                            printf('<input type="hidden" name="country" value="%s">', $_POST['country']);
                            printf('<input type="hidden" name="title" value="%s">', $_POST['title']);
                            printf('<input type="hidden" name="tags" value="%s">', $_POST['tags']);
                            printf('<input type="hidden" name="description" value="%s">', $_POST['description']);
                        ?>

                        <span class="float-right">
                            <button type="submit" class="btn custom-button">Post</button>
                        </span>
                    </form>

                    <!-- Redirect to previous page and refill data -->
                    <form action="./contribute.php" method="post">

                        <?php
                            printf('<input type="hidden" name="country" value="%s">', $_POST['country']);
                            printf('<input type="hidden" name="title" value="%s">', $_POST['title']);
                            printf('<input type="hidden" name="tags" value="%s">', $_POST['tags']);
                            printf('<input type="hidden" name="description" value="%s">', $_POST['description']);
                        ?>
                            <span class="float-right">
                                <button id="edit" type="submit" class="btn">Edit</button>
                            </span>
                    </form>
                </div>
            <!-- </div> -->
        </div>
    </body>
</html>
