<!--sitemap page-->
<?php
//page header
require_once __DIR__ . '/_header.php';
?>

<!--HTML part of Sitemap page-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SITEMAP</title>
        <meta charset="utf-8">
        <style></style>
    </head>
    <body style="background: #CCC;">
        <h1> Sitemap </h1>
        <ul>
            <li><a href="index.php?action=index" class="<?= $indexLinkClass ?>"><strong>Home</strong></a></li>
            <li><a href="index.php?action=about" class="<?= $aboutLinkClass ?>">About Us</a></li>
            <li><a href="index.php?action=view" class="<?= $viewLinkClass ?>">Motorbikes</a></li>
            <li><a href="index.php?action=login" class="<?= $loginLinkClass ?>"> Login</a></li>
            <li><a href="index.php?action=register" class="<?= $registerLinkClass ?>"> Register</a></li>
            <li><a href="index.php?action=contact" class="<?= $contactLinkClass ?>"> Contact Us</a></li>
            <li><a href="index.php?action=sitemap" class="<?= $mapLinkClass ?>">Sitemap</a></li>
            <li><a href="index.php?action=admin" target="_blank" class="<?= $adminLinkClass ?>"> Admin</a></li>
        </ul>
    </body>
</html>


<?php
//page footer
require_once __DIR__ . '/_footer.php';
