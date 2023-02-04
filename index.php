<?php

//index.php
//Author: Adam Winter
//Date: 2023-1-25
//Descriptions:  This is my controller for the MVC framework.  Routes will be found here.


//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//Require autoload file
require_once('vendor/autoload.php');

//Instantiate the F3 Base class
$f3 = Base::instance();

//Define a default route
$f3->route('GET /', function (){
    //Instantiate a view
    $view = new Template();
    echo $view->render("views/home.html");
});

//Define a default route
$f3->route('GET /home', function (){
    //Instantiate a view
    $view = new Template();
    echo $view->render("views/home.html");
});

//Define a route to start the application
$f3->route('GET|POST /start', function () use ($f3) {
    if ($_SERVER['REQUEST_METHOD'] ==  'POST'){
        //Move data from POST array to SESSION array
        $_SESSION['personalInfo'] = $_POST['JSONpayload'];
        require('controllers/personalInfo.php');
        //echo 'Received POST';
        //var_dump($_POST['JSONpayload']);
    }else{
        require('constants/states.php');
        //echo json_encode($states);
        $f3->set('states',$states);
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/personalInfo.html");
    }
});

//Define a route to start the application
$f3->route('GET /footer', function (){
    //Instantiate a view
    $view = new Template();
    echo $view->render("views/stickyFooterTest.html");
});

//Run Fat Free
$f3->run();

