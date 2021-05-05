<!--register form page-->
<?php
require_once __DIR__ . ('/_header.php');
require_once __DIR__ . ('/../src/dbconfig.php');
require_once __DIR__ . ('/../src/MainController.php');
require_once __DIR__ . ('/../src/functions.php');
require_once __DIR__ . ('/../src/db_connect.php');

//create an instance of USER class

$user = new USER();

//statements used when user tries to register details
if (isset($_POST['register'])) {
    $uname = strip_tags($_POST['username']); //strip all tags from the string
    $umail = strip_tags($_POST['email']);
    $upass = strip_tags($_POST['pass']);

    if ($uname == "") {
        $error = "Please provide Display Name!";
    } else if ($umail == "") {
        $error = "Please provide email address!";
    }
    //email and password validation
    else if (!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address!";
    } else if ($upass == "") {
        $error = "Please provide a password!";
    } else if (strlen($upass) < 6) {
        $error = "Password must be at least 6 characters";
    } else {
        try {
            $stmt = $user->runQuery('SELECT user_email FROM users WHERE user_email = :umail ');
            $stmt->execute(array(':umail' => $umail));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            //check if username and email already exists
            if ($row == true) {
                $error = "Email address already taken!";
            } else {

                if (register($uname, $umail, $upass)) {
                    $user->redirect('index.php?action=login');
                }
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    //redirect to the login page
    header("Location: index.php?action=login");
}
?>

<!--HTML part of the register page-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>REGISTER PAGE</title>
        <meta charset="utf-8">
        <style></style>
    </head>
    <body style="background: #CCC;">
        <div class="jumbotron text-center">
        <?php
        if (isset($error)) {
            echo '<div>' . $error . '</div>';
        }
        ?>
        <form action="" method="post">
            <h2>REGISTER</h2>
            <div class = "input">
                <label>Display Name</label><br>
                <input type = "text" name = "username" placeholder = "Display Name" required autofocus>
            </div><br>
            <div class = "input">
                <label>Email</label><br>
                <input type = "text" name = "email" placeholder = "email" required>
            </div><br>
            <div class = "input">
                <label>Password</label><br>
                <input type = "password" name = "pass" placeholder = "password" required>
            </div><br>
            <div class = "input">
                <button type = "submit" name = "register" class = "btn">Register</button>
            </div><br>
            <p>
                Do you have an account already? <a href="index.php?action=login" class="<?= $loginLinkClass ?>">Sign in</a>
            </p>
        </form>
        </div>
    </body>
</html>
<?php
require_once __DIR__ . ('/_footer.php');
