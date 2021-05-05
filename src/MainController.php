<?php
//main controller

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/product_functions.php';

//Each option that the user selects will be given one action
//which will link to templates

//index page
function indexAction() {
    $pageTitle = "HOME PAGE";
    $indexLinkClass = "active";
    $aboutLinkClass = "";
    $listLinkClass = "";
    $loginLinkClass = "";
    $registerLinkClass = "";
    $mapLinkClass = "";
    $contactLinkClass = "";
    $homeLinkClass = "";
    $updateLinkClass = "";
    $deleteLinkClass = "";
    $adminLinkClass = "";

    require_once __DIR__ . '/../templates/index.php';
}

//about page
function aboutAction() {
    $pageTitle = "ABOUT PAGE";
    $indexLinkClass = "";
    $aboutLinkClass = "active";
    $listLinkClass = "";
    $loginLinkClass = "";
    $registerLinkClass = "";
    $mapLinkClass = "";
    $contactLinkClass = "";
    $homeLinkClass = "";
    $updateLinkClass = "";
    $deleteLinkClass = "";
    $adminLinkClass = "";

    require_once __DIR__ . '/../templates/about.php';
}

//motorbikes page
function listAction() {
    $pageTitle = "MOTORBIKES";
    $indexLinkClass = "";
    $aboutLinkClass = "";
    $listLinkClass = "active";
    $loginLinkClass = "";
    $registerLinkClass = "";
    $mapLinkClass = "";
    $contactLinkClass = "";
    $homeLinkClass = "";
    $updateLinkClass = "";
    $deleteLinkClass = "";
    $adminLinkClass = "";

    require_once __DIR__ . '/../templates/list.php';
}

//login page
function loginAction() {
    $pageTitle = "LOGIN PAGE";
    $indexLinkClass = "";
    $aboutLinkClass = "";
    $listLinkClass = "";
    $loginLinkClass = "active";
    $registerLinkClass = "";
    $mapLinkClass = "";
    $contactLinkClass = "";
    $homeLinkClass = "";
    $updateLinkClass = "";
    $deleteLinkClass = "";
    $adminLinkClass = "";

    require_once __DIR__ . '/../templates/login.php';
}

//home page
function homeAction() {
    $pageTitle = "Home Page";
    $indexLinkClass = "";
    $aboutLinkClass = "";
    $listLinkClass = "";
    $loginLinkClass = "";
    $registerLinkClass = "";
    $mapLinkClass = "";
    $contactLinkClass = "";
    $homeLinkClass = "active";
    $updateLinkClass = "";
    $deleteLinkClass = "";
    $adminLinkClass = "";

    require_once __DIR__ . '/../templates/home.php';
}

//register page
function registerAction() {
    $pageTitle = "REGISTER PAGE";
    $indexLinkClass = "";
    $aboutLinkClass = "";
    $listLinkClass = "";
    $loginLinkClass = "";
    $registerLinkClass = "active";
    $mapLinkClass = "";
    $contactLinkClass = "";
    $homeLinkClass = "";
    $updateLinkClass = "";
    $deleteLinkClass = "";
    $adminLinkClass = "";

    require_once __DIR__ . '/../templates/register.php';
}

//contact page
function contactAction() {
    $pageTitle = "CONTACT US";
    $indexLinkClass = "";
    $aboutLinkClass = "";
    $listLinkClass = "";
    $loginLinkClass = "";
    $registerLinkClass = "";
    $mapLinkClass = "";
    $contactLinkClass = "active";
    $homeLinkClass = "";
    $updateLinkClass = "";
    $deleteLinkClass = "";
    $adminLinkClass = "";

    require_once __DIR__ . '/../templates/contact.php';
}

//sitemap page
function mapAction() {
    $pageTitle = "SITEMAP";
    $indexLinkClass = "";
    $aboutLinkClass = "";
    $listLinkClass = "";
    $loginLinkClass = "";
    $registerLinkClass = "";
    $mapLinkClass = "active";
    $contactLinkClass = "";
    $homeLinkClass = "";
    $updateLinkClass = "";
    $deleteLinkClass = "";
    $adminLinkClass = "";

    require_once __DIR__ . '/../templates/sitemap.php';
}

//bike page (admin)
function bikesAction() {

    $pageTitle = "MOTORBIKES";
    $indexLinkClass = "";
    $aboutLinkClass = "";
    $listLinkClass = "active";
    $loginLinkClass = "";
    $registerLinkClass = "";
    $mapLinkClass = "";
    $contactLinkClass = "";
    $homeLinkClass = "";
    $updateLinkClass = "";
    $deleteLinkClass = "";
    $adminLinkClass = "";

    require_once __DIR__ . '/../templates/list.php';
}

//update bike page
function updateAction($id) {

    $pageTitle = "UPDATE BIKE";
    $indexLinkClass = "";
    $aboutLinkClass = "";
    $listLinkClass = "";
    $loginLinkClass = "";
    $registerLinkClass = "";
    $mapLinkClass = "";
    $contactLinkClass = "";
    $homeLinkClass = "";
    $updateLinkClass = "active";
    $deleteLinkClass = "";
    $itemId = $id;
    $addLinkClass = "";
    $adminLinkClass = "";

    require_once __DIR__ . '/../templates/update_product_form.php';
}

//delete bike function
function deleteAction() {

    $pageTitle = "DELETE";
    $indexLinkClass = "";
    $aboutLinkClass = "";
    $listLinkClass = "";
    $loginLinkClass = "";
    $registerLinkClass = "";
    $mapLinkClass = "";
    $contactLinkClass = "";
    $homeLinkClass = "";
    $updateLinkClass = "";
    $deleteLinkClass = "active";
    $addLinkClass = "";
    $adminLinkClass = "";

    require_once __DIR__ . '/../templates/update_product_form.php';
}

//add bike page
function addAction() {

    $pageTitle = "ADD BIKE";
    $indexLinkClass = "";
    $aboutLinkClass = "";
    $listLinkClass = "";
    $loginLinkClass = "";
    $registerLinkClass = "";
    $mapLinkClass = "";
    $contactLinkClass = "";
    $homeLinkClass = "";
    $updateLinkClass = "";
    $deleteLinkClass = "";
    $addLinkClass = "active";
    $addLinkClass = "";
    $adminLinkClass = "";

    require_once __DIR__ . '/../templates/add_bike.php';
}

//admin page with add, update and delete options
function adminAction() {

    $pageTitle = "ADMIN";
    $indexLinkClass = "";
    $aboutLinkClass = "";
    $listLinkClass = "";
    $loginLinkClass = "";
    $registerLinkClass = "";
    $mapLinkClass = "";
    $contactLinkClass = "";
    $homeLinkClass = "";
    $updateLinkClass = "";
    $deleteLinkClass = "";
    $addLinkClass = "";
    $adminLinkClass = "active";

    require_once __DIR__ . '/../templates/admin.php';
}

//add user page
function addUserAction() {

    $pageTitle = "ADD USER";
    $indexLinkClass = "";
    $aboutLinkClass = "";
    $listLinkClass = "";
    $loginLinkClass = "";
    $registerLinkClass = "";
    $mapLinkClass = "";
    $contactLinkClass = "";
    $homeLinkClass = "";
    $updateLinkClass = "";
    $deleteLinkClass = "";
    $addLinkClass = "";
    $adminLinkClass = "";
    $addUserLinkClass = "active";

    require_once __DIR__ . '/../templates/add_user.php';
}

//bikes page (non-admin)
function viewBikesAction() {

    $pageTitle = "VIEW BIKES";
    $indexLinkClass = "";
    $aboutLinkClass = "";
    $listLinkClass = "";
    $loginLinkClass = "";
    $registerLinkClass = "";
    $mapLinkClass = "";
    $contactLinkClass = "";
    $homeLinkClass = "";
    $updateLinkClass = "";
    $deleteLinkClass = "";
    $addLinkClass = "";
    $adminLinkClass = "";
    $addUserLinkClass = "";
    $viewLinkClass = "active";

    require_once __DIR__ . '/../templates/view_bikes.php';
}

//registered users page
function userListAction() {

    $pageTitle = "USER DETAILS";
    $indexLinkClass = "";
    $aboutLinkClass = "";
    $listLinkClass = "";
    $loginLinkClass = "";
    $registerLinkClass = "";
    $mapLinkClass = "";
    $contactLinkClass = "";
    $homeLinkClass = "";
    $updateLinkClass = "";
    $deleteLinkClass = "";
    $addLinkClass = "";
    $adminLinkClass = "";
    $addUserLinkClass = "";
    $viewLinkClass = "active";

    require_once __DIR__ . '/../templates/user_list.php';
}

//update user details page
function updateUserAction($id) {

    $pageTitle = "UPDATE USER DETAILS";
    $indexLinkClass = "";
    $aboutLinkClass = "";
    $listLinkClass = "";
    $loginLinkClass = "";
    $registerLinkClass = "";
    $mapLinkClass = "";
    $contactLinkClass = "";
    $homeLinkClass = "";
    $updateLinkClass = "";
    $deleteLinkClass = "";
    $addLinkClass = "";
    $adminLinkClass = "";
    $addUserLinkClass = "";
    $viewLinkClass = "active";
    $itemId = $id;

    require_once __DIR__ . '/../templates/update_user.php';
}
