<!--add user form page-->
<?php
//-------- page header -------------------
require_once __DIR__ . '/_header.php';
//----------------------------------------

require_once '../src/product_functions.php';
require_once '../src/MainController.php';


//redirect to index page after adding user
if (isset($_POST['add'])) {
    add_user_Action();
    header("Location: index.php?action=index");
}

//check if user is admin
$user_is_admin = 0;
if (isset($_SESSION['user_is_admin'])) {
    $user_is_admin = $_SESSION['user_is_admin'];
} else {
    header("Location: index.php?action=home");
}
?>

<!--HTML part for add user form page-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add User</title>
        <meta charset="utf-8">
    </head>
    <body style="background: #CCC;">
        <div class="jumbotron text-center">

<h1>Add users</h1>

<form action="" method="POST">

    <p>
        <label>Name:</label><br>
        <input type="text" name="user_name" placeholder="Name" required autofocus>
    </p>
    <p>
        <label>Email:</label><br>
        <input type="text" name="user_email" placeholder="Email" required>
    </p>
    <p>
        <label>Password:</label><br>
        <input type="password" name="user_pass" placeholder="Password" required>
    </p>
    <p>
        <label>Admin:</label><br>
        <input type="checkbox" name="admin" value="1"/>
    </p>
    
    <input type="submit" name = "add" value="Add User">
</form>
        </div>
    </body>
</html>


<?php
require_once __DIR__ . ('/_footer.php');
