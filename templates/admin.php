<!--admin page with update and delete options-->
<?php
require_once __DIR__ . ('/_header.php');
require_once '../src/product_functions.php';
require_once '../src/dbconfig.php';
require_once '../src/db_connect.php';
require_once '../src/MainController.php';

//check if user is admin
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
        <title>Bikes Table</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style></style>
    </head>
    <body style="background: #CCC;">
        <div class="jumbotron text-center">
            <h2><strong>Here you can add, update and delete users and bikes</strong></h2><br>
            <a href="index.php?action=addUser" class="<?= $addUserLinkClass ?>"><button type="button" class="btn btn-primary btn-lg">Add New User</button></a><br><br>
            <a href="index.php?action=updateUserList" class="<?= $updateUserLinkClass ?>"><button type="button" class="btn btn-primary btn-lg">Update/Delete User Details</button></a><br><br>
            
            <a href="index.php?action=addBike" class="<?= $addLinkClass ?>"><button type="button" class="btn btn-primary btn-lg">Add New Bike</button></a><br><br>
            <a href="index.php?action=list" class="<?= $listLinkClass ?>"><button type="button" class="btn btn-primary btn-lg">Update/Delete Bike</button></a><br><br>
                        
        </div>
    </body>
</html>
<?php
require_once __DIR__ . ('/_footer.php');



