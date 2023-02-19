<?php

//index.php
//Author: Adam Winter
//Date: 2023-1-25
//Descriptions:  This is my controller for the MVC framework.  Routes will be found here.

use JobApplication\HomePage;

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
$f3->route('GET /', HomePage::display());

////Define a default route
//$f3->route('GET /', function (){
//    HomePage::display();
//});

////Define a default route
//$f3->route('GET /', function (){
//    //Instantiate a view
//    $view = new Template();
//    echo $view->render("views/home.html");
//});

//Define a default route
$f3->route('GET /home', function (){
    //Instantiate a view
    $view = new Template();
    echo $view->render("views/home.html");
});

//Define a route to start the application
$f3->route('GET|POST /start', function () use ($f3) {
    if ($_SERVER['REQUEST_METHOD'] ==  'POST'){
        require('controllers/personalInfo.php');
        //echo 'Received POST';
        //var_dump($_POST['JSONpayload']);
    }else{
        require('constants/states.php');
        //echo json_encode($states);
        $f3->set('states',$STATES);
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/personalInfo.html");
    }
});

//Define a route to continue the application
$f3->route('GET|POST /experience', function () use ($f3) {
    if ($_SERVER['REQUEST_METHOD'] ==  'POST'){
        require('controllers/experience.php');
        //echo 'Received POST';
        //var_dump($_POST['JSONpayload']);
    }else{
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/experience.html");
    }
});

//Define a route to finish the application
$f3->route('GET|POST /mailingLists', function () use ($f3) {
    if ($_SERVER['REQUEST_METHOD'] ==  'POST'){
        require('controllers/mailingLists.php');
        //echo 'Received POST';
        //var_dump($_POST['JSONpayload']);
    }else{
        require('constants/mailingLists.php');
        $f3->set('jobs',$JOBS);
        $f3->set('verticals',$VERTICALS);
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/mailingLists.html");
    }
});

//Define a route to the application summary
$f3->route('GET|POST /summary', function ($f3) {  //instead of use you can just pass the object in as parameter
    if ($_SERVER['REQUEST_METHOD'] ==  'POST'){
        //Move data from POST array to SESSION array
//        $_SESSION['mailingLists'] = $_POST['JSONpayload'];
//        require('controllers/mailingLists.php');
        //echo 'Received POST';
        //var_dump($_POST['JSONpayload']);
    }else{
        require('controllers/summary.php');
        $f3->sync('SESSION');
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/summary.html");
    }
});

//Define a route to start the application
$f3->route('GET /footer', function (){
    //Instantiate a view
    $view = new Template();
    echo $view->render("views/stickyFooterTest.html");
});

//Define a route to start the application
$f3->route('GET /info', function ($f3){
    $f3->set('password', sha1('Password01'));
    $f3->set('favFood', 'popsicle');
    $f3->set('favColor', 'purple');
    $f3->set('mathNumber', 67);
    $f3->set('radius', 10);

    //Define an array of fruits
    $fruits = array("apple", "banana", "orange");
    $f3->set('fruits', $fruits);

    //Define an associative array
    $cupcakes = array("chocolate"=>"Chocolate Ganache", "strawberry"=>"Strawberry Shortcake", "maple"=>"Maple Walnut");
    $f3->set('cupcakes', $cupcakes);

    $age = 29;
    $f3->set('age', $age);



    //Instantiate a view
    $view = new Template();
    echo $view->render("views/info.html");
});

//Run Fat Free
$f3->run();

