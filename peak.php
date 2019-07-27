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

        <!-- Redirect to previous page and refill data -->
        <form action="./contribute.php" method="post">
            <?php
                printf('<input type="hidden" name="country" value="%s">', $_POST['country']);
                printf('<input type="hidden" name="title" value="%s">', $_POST['title']);
                printf('<input type="hidden" name="tags" value="%s">', $_POST['tags']);
                printf('<input type="hidden" name="description" value="%s">', $_POST['description']);
            ?>
            <img src="./images/edit-icon.png"><input type="submit" value="Edit">
        </form>
        <div>
            <!-- Preview Card -->
            <?php
                printf ("<p class=\"country\">%s</p>", $_POST['country']);
                printf ("<h2>%s</h2>", $_POST['title']);
                printf ("<p class=\"description\">%s</p>", $_POST['description']);
                printf ("<p class=\"tags\">%s</p>", $_POST['tags']);
            ?>
        </div>

        <!-- Redirect to next page to add to DB -->
        <form action="./thankyou.php" method="post">
            <?php
                printf('<input type="hidden" name="country" value="%s">', $_POST['country']);
                printf('<input type="hidden" name="title" value="%s">', $_POST['title']);
                printf('<input type="hidden" name="tags" value="%s">', $_POST['tags']);
                printf('<input type="hidden" name="description" value="%s">', $_POST['description']);
            ?>
            <input type="submit" value="Post">
        </form>
    </body>
</html>
