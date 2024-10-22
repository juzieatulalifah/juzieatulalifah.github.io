<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>


<link rel="stylesheet" href="style.css" >
<style>
    .button {
    text-decoration: none; 
    color: white; 
}
</style>

<nav class="navbar">
        <a
        class="navbar-logo">Space<span>X</span>
        </a>


        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        
            <div class="nav-list">
                <a href="index.php"> Home</a>
                <a href="aboutme.html"> About</a>
                <a href=#details>details</a>
                <a href="baru.html"> Help</a>
                <a href="survey.php">Survey</a>
                <a href="data.php">Upcoming Event</a>
                <!-- <a href="login.php"> Log In</a> -->
                <?php if(isset($_SESSION['login'])) : ?>
                    <a href="logout.php" class="button">
                    Logout
                    </a>
                <?php else : ?>
                    <a href="login.php" class="button">
                    Login
                    </a>
            </div>


        <?php endif; ?>
        </nav>
    