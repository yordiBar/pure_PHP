<!--add bike form page-->
<?php
//-------- page header -------------------
require_once __DIR__ . '/_header.php';
//----------------------------------------

require_once '../src/product_functions.php';
require_once '../src/MainController.php';

//redirect to list page when add button clicked
if (isset($_POST['add'])) {
    add_product_Action();
    header("Location: index.php?action=list");
}

//check if logged in user is an admin
$user_is_admin = 0;
if (isset($_SESSION['user_is_admin'])) {
    $user_is_admin = $_SESSION['user_is_admin'];
} else {
    header("Location: index.php?action=home");
}
?>

<!--HTML part for add bike form page-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ADD BIKE</title>
        <meta charset="utf-8">
    </head>
    <body style="background: #CCC;">
        <div class="jumbotron text-center">

            <h1>Add bikes</h1>

            <form action="" method="POST">
                <p>
                    <label>Category:</label><br>
                    <input type="text" name="category" placeholder="Category" autofocus="">
                </p>

                <p>
                    <label>Name:</label><br>
                    <input type="text" name="name" placeholder="Name">
                </p>
                <p>
                    <label>Engine CC:</label><br>
                    <input type="text" name="engine_cc" placeholder="Engine size">
                </p>
                <p>
                    <label>BHP:</label><br>
                    <input type="text" name="bhp" placeholder="BHP">
                </p>
                <p>
                    <label>Speed (mph):</label><br>
                    <input type="text" name="top_speed" placeholder="Top Speed">
                </p>
                <p>
                    <label>Price:</label><br>
                    <input type="text" name="price" placeholder="Price">
                </p>
                <p>
                    <label>Image:</label><br>
                    <input type="text" name="image" placeholder="Image path > (\images\???)">
                </p>
                <input type="submit" name = "add" value="Add Bike Details">
            </form>
        </div>
    </body>
</html>


<?php
require_once __DIR__ . ('/_footer.php');
