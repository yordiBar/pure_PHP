<!--update bike details form-->
<?php
//-------- page header -------------------
require_once __DIR__ . '/_header.php';
//----------------------------------------

require_once '../src/product_functions.php';
require_once __DIR__ . ('/../src/MainController.php');


//call function to get all items form bikes table
if (isset($_POST['update'])) {
    update_product_Action();
    $bike = get_bike_by_id($itemId);
} else {
    $bike = get_bike_by_id($itemId);
}

//check if logged in user is an admin and redirect
$user_is_admin = 0;
if (isset($_SESSION['user_is_admin'])) {
    $user_is_admin = $_SESSION['user_is_admin'];
} else {
    header("Location: index.php?action=home");
}
?>

<!--HTML part for Update page-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bikes Table</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body style="background: #CCC;"> 
        <div class="jumbotron text-center">
        <h1>Update bikes</h1>

        <form action="" method="POST">
            <!-- ****** send ID as hidden ***** -->
            <input type="hidden" name="id" value="<?= $itemId ?>">
            <p>
                <label>Category:</label><br>
                <input type="text" name="category" value="<?= $bike['category'] ?>"><!--fill form fields with database values to be updated -->
            </p>
            <p>
                <label>Name:</label><br>
                <input type="text" name="name" value="<?= $bike['name'] ?>">
            </p>
            <p>
                <label>Engine CC:</label><br>
                <input type="text" name="engine_cc" value="<?= $bike['engine_cc'] ?>">
            </p>
            <p>
                <label>BHP:</label><br>
                <input type="text" name="bhp" value="<?= $bike['bhp'] ?>">
            </p>
            <p>
                <label>Speed:</label><br>
                <input type="text" name="top_speed" value="<?= $bike['top_speed'] ?>">
            </p>
            <p>
                <label>Price:</label><br>
                <input type="text" name="price" value="<?= $bike['price'] ?>">
            </p>
            <p>
                <label>Image:</label><br>
                <input type="text" name="image" value="<?= $bike['image'] ?>">
            </p>


            <input type="submit" name = "update" value="Update Bike Details">

        </form>
        </div>
    </body>
</html>

<?php
//page footer
require_once __DIR__ . ('/_footer.php');
