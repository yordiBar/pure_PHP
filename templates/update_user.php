<?php
//-------- page header -------------------
require_once __DIR__ . '/_header.php';
//----------------------------------------

require_once '../src/product_functions.php';
require_once '../src/MainController.php';


//call function to get all items form users table
if (isset($_POST['update'])) {
    update_user_Action();
    $user = get_user_by_id($itemId);
} else {
    $user = get_user_by_id($itemId);
}

$user_is_admin = 0;
if (isset($_SESSION['user_is_admin'])) {
    $user_is_admin = $_SESSION['user_is_admin'];
} else {
    header("Location: index.php?action=home");
}
?>

<!--HTML part for update users page-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update User</title>
        <meta charset="utf-8">
    </head>
    <body style="background: #CCC;">
        <div class="jumbotron text-center">

            <h1>Update users</h1>

            <form action="" method="POST">
                <!-- ****** send ID as hidden ***** -->
                <input type="hidden" name="id" value="<?= $itemId ?>">
                <p>
                    <label>Name:</label><br>
                    <input type="text" name="user_name" value="<?= $user['user_name'] ?>" placeholder="Name" required autofocus>
                </p>
                <p>
                    <label>Email:</label><br>
                    <input type="text" name="user_email" value="<?= $user['user_email'] ?>" placeholder="Email" required>
                </p>
                <p>
                    <label>Admin:</label><br>
                    <?php
                    //checkbox to change admin rights
                    if ($user['is_admin'] == 1) {
                        echo '<input type="checkbox" name="admin" value="1" checked/>';
                    } else {
                        echo '<input type="checkbox" name="admin" value="1" />';
                    }
                    ?>

                </p>

                <input type="submit" name = "update" value="Update User">
            </form>
        </div>
    </body>
</html>


<?php
//page footer
require_once __DIR__ . ('/_footer.php');
