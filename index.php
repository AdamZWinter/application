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

//Define a route to start the application
$f3->route('GET /start', function (){
    //Instantiate a view
    $view = new Template();
    echo $view->render("views/personalInfo.html");
});

//Define a route to start the application
$f3->route('GET /footer', function (){
    //Instantiate a view
    $view = new Template();
    echo $view->render("views/stickyFooterTest.html");
});

//Run Fat Free
$f3->run();

