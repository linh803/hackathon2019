<!-- Connect to database -->
<?php
    include 'db.php';
    include 'navbar.php';
    $conn = db_connect();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Contribute</title>
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./nav.css">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="./background.css">
        <link rel="stylesheet" href="./contribute.css">
        <meta charset="utf-8">
    </head>

    <body id="bckgrd" background="./images/contribute-background.png">
        <?php
            print_navbar();
        ?>

        <div id="main" class="container">
            <div class="row">
                <div class="col">
                    <h1 class="heading1">CONTRIBUTE</h1>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form name="contribute" action="./peek.php" method="post" class="needs-validation" novalidate>
                                <!-- Retain data when returning from peak.php -->
                                <div class="form-group">
                                    <label for="location">LOCATION</label><br>
                                    <?php
                                        if(empty($_POST['country'])) {
                                            printf('<input class="form-control" list="location" name="country" placeholder="Country" required>');
                                        } else {
                                            printf('<input class="form-control" list="location" name="country" value="%s" required>', $_POST['country']);
                                        }
                                    ?>
                                    <datalist id="location">
                                        <!-- Retrieve possible countries -->
                                        <?php
                                            $sql = 'SELECT * FROM location ORDER BY country';
                                            $result = mysqli_query($conn, $sql);

                                            while($country = mysqli_fetch_row($result)) {
                                                printf ("<option value=\"%s\">", $country[1]);
                                            }
                                        ?>
                                    </datalist>
                                    <?php
                                        echo "<div class=\"invalid-feedback\">
                                            Country is required.<br>
                                        </div>";
                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="tags">TAGS</label><br>
                                    <?php
                                        if(empty($_POST['tags'])) {
                                            printf('<input class="form-control" id="tags" type="text" name="tags" placeholder="#work, #shop, ...">');
                                        } else {
                                            printf('<input class="form-control" id="tags" type="text" name="tags" value="%s">', $_POST['tags']);
                                        }
                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="title">TITLE</label><br>
                                    <?php
                                        if(empty($_POST['title'])) {
                                            printf('<input class="form-control" id="title" type="text" name="title" placeholder="Title" maxlength="200" required>');
                                        } else {
                                            printf('<input class="form-control" id="title" type="text" name="title" value="%s" maxlength="200" required>', $_POST['title']);
                                        }
                                        echo "<div class=\"invalid-feedback\">
                                            Title is required.<br>
                                        </div>";
                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="description">DESCRIPTION</label><br>
                                    <?php
                                        if(empty($_POST['description'])) {
                                            printf('<textarea class="form-control" id="description" name="description" placeholder="Tell us more..." maxlength="250" required></textarea>');
                                        } else {
                                            printf('<textarea class="form-control" id="description" name="description" maxlength="250" required>%s</textarea>', $_POST['description']);
                                        }
                                        echo "<div class=\"invalid-feedback\">
                                            Description is required.<br>
                                        </div>";
                                    ?>
                                </div>

                                <span class="float-right">
                                    <button type="submit" class="btn custom-button">Post</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<!-- Taken from Bootstrap documentation -->
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
