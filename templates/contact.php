<!--contact form page-->
<?php
require_once __DIR__ . ('/_header.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CONTACT US</title>
        <meta charset="utf-8">
    </head>
    <body style="background: #CCC;">
        <div class="jumbotron text-center">

        <h1><strong>Contact Us</strong></h1>
        <p><strong>If you wish to contact us please use the form below</strong></p>

        <h2>Send e-mail to Bart Rybak</h2>

        <form action="mailto:B00122787@student.itb.ie" method="post" enctype="text/plain">
            Name:<br>
            <input type="text" name="name" placeholder="Your Name" autofocus><br>
            E-mail:<br>
            <input type="text" name="mail" placeholder="Your Email"><br>
            Comment:<br>
            <input type="text" name="comment" size="50" placeholder="Your comment"><br><br>
            <input type="submit" value="Send">
            <input type="reset" value="Reset">
        </form>  
        </div>
    </body>
</html>
<?php
require_once __DIR__ . ('/_footer.php');
