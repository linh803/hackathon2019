<!DOCTYPE html>
<html>
    <head>
        <title>Contribute</title>
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

        <h1>CONTRIBUTE</h1>

        <!--TODO: add action page-->
        <form action="" method="post">
            <label for="location">LOCATION</label><br>
            <input list="location" placeholder="City">
            <datalist id="location">
                <option value="City">
                <!--TODO: print options using js or php-->
            </datalist><br>

            <label for="tags">TAGS</label><br>
            <input id="tags" type="text" name="tags" placeholder="#work, #shop, ..."><br>

            <!--TODO: word limit-->
            <label for="title">TITLE</label><br>
            <input id="title" type="text" name="title" placeholder="Title" maxlength="20"><br>

            <!--TODO: size + word limit-->
            <label for="description">DESCRIPTION</label><br>
            <textarea id="description" name="description" placeholder="Tell us more..." maxlength="250"></textarea><br>

            <input type="submit" value="Post">
        </form>
    </body>
</html>
