<!--bike list page with admin options-->
<?php
require_once __DIR__ . ('/_header.php');
require_once '../src/product_functions.php';
require_once '../src/dbconfig.php';
require_once '../src/db_connect.php';
require_once '../src/MainController.php';

//check if logged in user is an admin
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
        <div class="container">
            <h2><strong>Some of the more popular types of motorcycles</strong></h2><br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Engine CC</th>
                        <th>BHP</th>
                        <th>Top Speed (mp/h)</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //create a table and display bikes data from the database
                    $bikes = get_all_bikes();
                    foreach ($bikes as &$bike) {
                        ?>
                        <tr>
                            <td><?= $bike['category'] ?></td>
                            <td><?= $bike['name'] ?></td>
                            <td><?= $bike['engine_cc'] ?></td>
                            <td><?= $bike['bhp'] ?></td>
                            <td><?= $bike['top_speed'] ?></td>
                            <td>&euro; <?= $bike['price'] ?></td>
                            <td><img src="<?php echo $bike['image']; ?>" style="height: 120px;width: 180px;" alt="photo of a motorbike"/></td>

                            <td><a href="index.php?action=update&id=<?php echo $bike['id'] ?>" class="<?= $updateLinkClass ?>"><button type="button" class="btn btn-primary btn-lg">UPDATE</button></td>
                            <td><a href="index.php?action=deleteBike&id=<?php echo $bike['id'] ?>" class="<?= $deleteLinkClass ?>"><button type="button" class="btn btn-primary btn-lg">DELETE</button></td>
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
require_once __DIR__ . ('/_footer.php');



