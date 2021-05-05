<?php
//main functions file for the whole website

require_once '../src/dbconfig.php';
require_once '../src/db_connect.php';

//function to get all items from bikes table
function get_bike_by_id($id) {
    $db = new Database();
    $connection = $db->dbConnection();

    //SQL query from the database that returns all items from the database
    $sql = 'SELECT * FROM bikes Where id=:id';

    //execute query and collect results
    $statement = $connection->prepare($sql);
    $statement->execute(array(':id' => $id));
    $bike = $statement->fetch(PDO::FETCH_ASSOC);
    return $bike;
}

//function to get all items from users table
function get_user_by_id($id) {
    $db = new Database();
    $connection = $db->dbConnection();

    //SQL query from the database that returns all items from the database
    $sql = 'SELECT * FROM users Where user_id=:id';

    //execute query and collect results
    $statement = $connection->prepare($sql);
    $statement->execute(array(':id' => $id));
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;
}

//get all items from users table
function get_all_bikes() {
    $db = new Database();
    $connection = $db->dbConnection();

    //SQL query from the database that returns all items from the database
    $sql = 'SELECT * FROM bikes';

    //execute query and collect results
    $statement = $connection->query($sql);
    $allbikes = $statement->fetchAll();

    return $allbikes;
}

function get_all_users() {
    $db = new Database();
    $connection = $db->dbConnection();

    //SQL query from the database that returns all items from the database
    $sql = 'SELECT * FROM users';

    //execute query and collect results
    $statement = $connection->query($sql);
    $allUsers = $statement->fetchAll();

    return $allUsers;
}

//update bike details
function update_bike($connection, $id, $category, $name, $engine, $bhp, $speed, $price, $image) {

    $sql = "UPDATE `bikes` SET `category`=:category,`name`=:name,`engine_cc`=:engine_cc,`bhp`=:bhp,`top_speed`=:top_speed,`price`=:price,`image`=:image WHERE `id`=:id";


    //execute query and collect results
    $statement = $connection->prepare($sql);
    $numRowsAffected = $statement->execute(
            array(':id' => $id,
                ':category' => $category,
                ':name' => $name,
                ':engine_cc' => $engine,
                ':bhp' => $bhp,
                ':top_speed' => $speed,
                ':price' => $price,
                ':image' => $image,));

    header("Location: index.php?action=list");

    $queryWasSuccessful = ($numRowsAffected > 0);

    return $queryWasSuccessful;
}

//add bike to the bikes table
function Add_bike($connection, $category, $name, $engine, $bhp, $speed, $price, $image) {

    $sql = "INSERT INTO `bikes`( `category`, `name`, `engine_cc`, `bhp`, `top_speed`, `price`, `image`) "
            . "VALUES (:category,:name,:engine_cc,:bhp,:top_speed,:price,:image)";

    //execute query and collect results
    $statement = $connection->prepare($sql);
    $numRowsAffected = $statement->execute(
            array(
                ':category' => $category,
                ':name' => $name,
                ':engine_cc' => $engine,
                ':bhp' => $bhp,
                ':top_speed' => $speed,
                ':price' => $price,
                ':image' => $image,));

    $queryWasSuccessful = ($numRowsAffected > 0);

    return $queryWasSuccessful;
}

//add user to users table
function add_user($connection, $username, $email, $password, $is_admin) {

    $sql = "INSERT INTO `users`( `user_name`, `user_email`, `user_pass`, `is_admin`) "
            . "VALUES (:user_name,:user_email,:user_pass,:is_admin)";

    //execute query and collect results
    $statement = $connection->prepare($sql);
    $numRowsAffected = $statement->execute(
            array(
                ':user_name' => $username,
                ':user_email' => $email,
                ':user_pass' => $password,
                ':is_admin' => $is_admin,
    ));

    $queryWasSuccessful = ($numRowsAffected > 0);

    return $queryWasSuccessful;
}

//delete bike from bikes table
function delete_bike($connection, $id) {

    $sql = "DELETE FROM `bikes` WHERE `id`=:id";

    //execute query and collect results
    $statement = $connection->prepare($sql);
    $numRowsAffected = $statement->execute(
            array(
                ':id' => $id));

    $queryWasSuccessful = ($numRowsAffected > 0);

    return $queryWasSuccessful;
}

//delete user from users table
function delete_user($connection, $id) {

    $sql = "DELETE FROM `users` WHERE `user_id`=:id";

    //execute query and collect results
    $statement = $connection->prepare($sql);
    $numRowsAffected = $statement->execute(
            array(
                ':id' => $id));

    $queryWasSuccessful = ($numRowsAffected > 0);

    return $queryWasSuccessful;
}

//function used to register user
function register($uname, $umail, $upass) {
    try {
        $new_password = password_hash($upass, PASSWORD_DEFAULT);

        $database = new Database();
        $db = $database->dbConnection();

        $stmt = $db->prepare("INSERT INTO users(user_name,user_email,user_pass) VALUES(:uname, :umail, :upass)");

        $stmt->bindparam(":uname", $uname);
        $stmt->bindparam(":umail", $umail);
        $stmt->bindparam(":upass", $new_password);

        $stmt->execute();
        echo "<strong>New User Created</strong>";
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

//function to verify a user in the database
function checkLogin($umail, $upass) {
    try {
        $database = new Database();
        $db = $database->dbConnection();

        $stmt = $db->prepare("SELECT user_id, user_name, user_pass, is_admin FROM users WHERE user_email=:umail");
        $stmt->execute(array(':umail' => $umail));
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        //echo $userRow['user_pass'];

        if (password_verify($upass, $userRow['user_pass'])) {
            $_SESSION['user_session'] = $userRow['user_id'];
            $_SESSION['user_is_admin'] = $userRow['is_admin'];
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//send values to database
function update_product_Action() {
    $db = new Database();
    $connection = $db->dbConnection();

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $engine = filter_input(INPUT_POST, 'engine_cc', FILTER_SANITIZE_NUMBER_INT);
    $bhp = filter_input(INPUT_POST, 'bhp', FILTER_SANITIZE_NUMBER_INT);
    $speed = filter_input(INPUT_POST, 'top_speed', FILTER_SANITIZE_NUMBER_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT);
    $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);

    $success = update_Bike($connection, $id, $category, $name, $engine, $bhp, $speed, $price, $image);

    if ($success) {
        $message = "SUCCESS - product with updated";
    } else {
        $message = "Sorry, there was a problem updating the product";
    }
    require_once __DIR__ . '/../templates/message.php';
}

//send values to database
function update_user_Action() {
    $db = new Database();
    $connection = $db->dbConnection();
    $isAdminBool = 0; //variable for checkbox set to unchecked as default

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $username = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_STRING);
    $admin = filter_input(INPUT_POST, 'admin');

    if ($admin == "1") {
        $isAdminBool = 1;
    }

    $success = update_user($connection, $id, $username, $email, $isAdminBool);

    if ($success) {
        $message = "SUCCESS - user details updated";
    } else {
        $message = "Sorry, there was a problem updating user details";
    }
    require_once __DIR__ . '/../templates/message.php';
}

//add bikes to database
function add_product_Action() {
    $db = new Database();
    $connection = $db->dbConnection();

    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $engine = filter_input(INPUT_POST, 'engine_cc', FILTER_SANITIZE_NUMBER_INT);
    $bhp = filter_input(INPUT_POST, 'bhp', FILTER_SANITIZE_NUMBER_INT);
    $speed = filter_input(INPUT_POST, 'top_speed', FILTER_SANITIZE_NUMBER_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT);
    $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);

    $success = Add_bike($connection, $category, $name, $engine, $bhp, $speed, $price, $image);

    if ($success) {
        $message = "SUCCESS - product with updated";
    } else {
        $message = "Sorry, there was a problem updating the product";
    }
    require_once __DIR__ . '/../templates/message.php';
}

//delete bike from database
function delete_bike_action($id) {
    $db = new Database();
    $connection = $db->dbConnection();

    $success = delete_bike($connection, $id);

    if ($success) {
        $message = "SUCCESS - product deleted";
    } else {
        $message = "SORRY, product could not be deleted";
    }

    require_once __DIR__ . '/../templates/message.php';
}

//add new user (admin)
function add_user_Action() {
    $db = new Database();
    $connection = $db->dbConnection();
    $isAdminBool = 0;

    $username = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'user_pass', FILTER_SANITIZE_NUMBER_INT);
    $new_password = password_hash($password, PASSWORD_DEFAULT);
    $isAdmin = filter_input(INPUT_POST, 'admin');
    if ($isAdmin == "1") {
        $isAdminBool = 1;
    }

    $success = add_user($connection, $username, $email, $new_password, $isAdminBool);

    if ($success) {
        $message = "SUCCESS - product with updated";
    } else {
        $message = "Sorry, there was a problem updating the product";
    }
    require_once __DIR__ . '/../templates/message.php';
}

//delete user
function delete_user_action($id) {
    $db = new Database();
    $connection = $db->dbConnection();

    $success = delete_user($connection, $id);

    if ($success) {
        $message = "SUCCESS - user deleted";
    } else {
        $message = "SORRY, user could not be deleted";
    }

    require_once __DIR__ . '/../templates/message.php';
}

//update user database table
function update_user($connection, $id, $username, $email, $admin) {
    $sql = "UPDATE `users` SET `user_name`=:user_name,`user_email`=:user_email,`is_admin`=:is_admin WHERE `user_id`=:id";
    //execute query and collect results
    $statement = $connection->prepare($sql);    
    $numRowsAffected = $statement->execute(
            array(':id' => $id,
                ':user_name' => $username,
                ':user_email' => $email,
                ':is_admin' => $admin,
                ));    
    header("Location: index.php?action=updateUserList");
    $queryWasSuccessful = ($numRowsAffected > 0);
    return $queryWasSuccessful;
}
