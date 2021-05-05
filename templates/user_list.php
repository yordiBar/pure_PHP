<!--user details update page-->
<?php
require_once __DIR__ . ('/_header.php');
require_once '../src/product_functions.php';
require_once '../src/dbconfig.php';
require_once '../src/db_connect.php';
require_once '../src/MainController.php';

//check if logged in user is an admin and redirect
$user_is_admin = 0;
if (isset($_SESSION['user_is_admin'])) {
    $user_is_admin = $_SESSION['user_is_admin'];
} 

if($user_is_admin == 0){
    header("Location: index.php?action=home");
}
?>

<!--HTML part for Motorbikes page-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User Table</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style></style>
    </head>
    <body style="background: #CCC;">
        <div class="container">
            <h2><strong>Table of Users</strong></h2><br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Is Admin</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //create a table and display users data from the database
                    $users = get_all_users();
                    foreach ($users as &$user) {
                        ?>
                        <tr>
                            <td><?= $user['user_name'] ?></td>
                            <td><?= $user['user_email'] ?></td>
                            <td><?= $user['is_admin'] ?></td>
                            

                            <td><a href="index.php?action=updateUser&id=<?php echo $user['user_id'] ?>"><button type="button" class="btn btn-primary btn-lg">UPDATE</button></td>
                            <td><a href="index.php?action=deleteUser&id=<?php echo $user['user_id'] ?>"><button type="button" class="btn btn-primary btn-lg">DELETE</button></td>
                        </tr>
                        <?php
                    }
                    ?>
                <!--Add Bike button-->
                </tbody>
            </table>
            <a href="index.php?action=addBike" class="<?= $addLinkClass ?>"><button type="button" class="btn btn-primary btn-lg">Add New Bike</button></a>
        </div>
    </body>
</html>
<?php
//page footer
require_once __DIR__ . ('/_footer.php');



