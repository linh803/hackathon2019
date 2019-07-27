<?php
function print_navbar() {
echo <<<EOF
<nav class="navbar navbar-expand-md justify-content-between">
    <span id='logo'><a href='./index.php'><img class='navbar-brand' src='./images/logo.png'></a></span>
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
EOF;
}
?>