<?php
//check if a session is already started and active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user_id = NULL;
$user_is_admin = 0;
if (isset($_SESSION['user_session'])) {
    $user_id = $_SESSION['user_session'];
}
if (isset($_SESSION['user_is_admin'])) {
    $user_is_admin = $_SESSION['user_is_admin'];
}
?>

<!--HTML part for navbar-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Navbar</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="<?= $indexLinkClass ?>"><a href="index.php?action=index" >Home</a></li>
                        <li class="<?= $aboutLinkClass ?>"><a href="index.php?action=about" >About Us</a></li>
                        <li class="<?= $viewLinkClass ?>"><a href="index.php?action=view" >Motorbikes</a></li>
                        <li class="<?= $contactLinkClass ?>"><a href="index.php?action=contact" >Contact Us</a></li>
                        <li class="<?= $mapLinkClass ?>"><a href="index.php?action=sitemap" >Sitemap</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        
                        <?php
                        
                        //show admin options button if user with admin rights
                        if ($user_is_admin == 1) {
                            echo '<li class="<?= $adminLinkClass ?>"><a href="index.php?action=admin" > Admin</a></li>';
                        }
                        //show logout button if a user is logged in
                        if (isset($user_id)) {
                            echo '<li class="<?= $adminLinkClass ?>"><a href="index.php?action=logout" > Logout</a></li>';
                        } else
                        {
                            echo '<li class="<?= $loginLinkClass ?>"><a href="index.php?action=login" > Login</a></li>';
                            echo '<li class="<?= $registerLinkClass ?>"><a href="index.php?action=register" > Register</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>