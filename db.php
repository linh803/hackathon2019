<!-- Connect to database -->
<?php
    function db_connect() {
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

        return $conn;
    }
?>
