<?php
session_start();
//front controller
//files required to connect to the database

require_once('../src/MainController.php');
require_once('../src/db_connect.php');
require_once('../src/dbconfig.php');


//variable used to store user's chosen action

$action = filter_input(INPUT_GET, 'action');

/*switch with navigation bar menu and other actions
used depending on user interaction with the website*/
switch ($action) {

    case 'about':
        aboutAction();
        break;

    case 'list':
        listAction();
        break;

    case 'login':
        loginAction();
        break;

    case 'register':
        registerAction();
        break;
    
    case 'contact':
        contactAction();
        break;
    
    case 'sitemap':
        mapAction();
        break;
    
    case 'home':
        homeAction();
        break;
    
    case 'update':
        $id = filter_input(INPUT_GET, 'id');
        updateAction($id);
        break;
    
    case 'deleteBike':
        $id = filter_input(INPUT_GET, 'id');
        delete_bike_action($id);
        listAction();
        break;
    
    case 'deleteUser':
        $id = filter_input(INPUT_GET, 'id');
        delete_user_action($id);
        userListAction();
        break;
        
    case 'addBike':
        addAction();
        break;
    
    case 'admin':
        adminAction();
        break;
    
    case 'addUser';
        addUserAction();
        break; 
    
    case 'view':
        viewBikesAction();
        break;
    
    case 'logout':
        session_unset();
        session_destroy();
        
    case 'updateUserList':
        userListAction();
        break;
    
    case 'updateUser':
        $id = filter_input(INPUT_GET, 'id');
        updateUserAction($id);
        break;
        
    default:
        indexAction();
}

//test if connection to DB successful

/*if(null != $connection){
    print 'Success';
} else{
    print 'error';
}*/
