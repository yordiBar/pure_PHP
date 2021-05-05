<!--home page for logged in user-->
<?php
require_once '../src/sessions.php';
require_once '../src/functions.php';

require_once __DIR__ . ('/_header.php');


//create a new instance of the user class

$auth_user = new USER();

//set the user_id for this sessions
$user_id = NULL;
if (isset($_SESSION['user_session'])) {
    $user_id = $_SESSION['user_session'];
}

//run the sql statement that selects all the user table that have the id that corresponds to the user that is logging in
$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id" => $user_id));

//return the row in the database in an associative array
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!--HTML part for the the page when user logs in-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style></style>
    </head>
    <body style="background: #CCC;">
        <div class="jumbotron text-center">

        <!---Print the username to the screen of the logged-in user-->
        <h1>Welcome! You are logged in as <?php print($userRow['user_name']); ?></h1>
        
        <!--A link to view bikes-->
        <h2> <a href="index.php?action=view" class="<?= $viewLinkClass ?>">View Bikes</a></h2>
        </div>
    </body>
</html> 
<?php
require_once __DIR__ . ('/_footer.php');
