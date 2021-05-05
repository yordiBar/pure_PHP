<?php
//login page
require_once __DIR__ . '/_header.php';
require_once __DIR__ . ('/../src/functions.php');
require_once __DIR__ . ('/../src/MainController.php');

$login = new User();

if (isset($_POST['login'])) {
    try {
        $umail = strip_tags($_POST['email']);
        $upass = strip_tags($_POST['pass']);
        
        //check if user entered correct login details
        if (checkLogin($umail, $upass)) {
            $login->redirect('index.php?action=home');
        } else {
            $error = "Wrong Details!";
        }
    } catch (Exception $ex) {
        $error = "Exception occured";
    }
}
?>

<!--HTML part for Login Page-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>LOGIN PAGE</title>
        <meta charset="utf-8">
        <style></style>
    </head>
    <body style="background: #CCC;">
        <div class="jumbotron text-center">

        <form action="" method="post" id="login-form">
            <h2>LOGIN</h2>
            <div id="error">
                <?php
                if (isset($error)) {
                    echo '<div>' . $error . '</div>';
                }
                ?>
                <div class="input">
                    <label>EMAIL</label><br>
                    <input type="text" name="email" placeholder="email" required autofocus>
                </div><br>
                <div class="input">
                    <label>PASSWORD</label><br>
                    <input type="password" name="pass" placeholder="password" required>
                </div><br>
                <div class="input">
                    <button type="submit" name="login" class="btn">Login</button>
                </div><br>
                <p>
                    Don't have an account yet? <a href="index.php?action=register" class="<?= $registerLinkClass ?>">Register</a>    
                </p>
        </form>
</div>
    </body>
</html>
<?php
require_once __DIR__ . ('/_footer.php');
