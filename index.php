<?php

//index.php
//Author: Adam Winter
//Date: 2023-1-25
//Descriptions:  This is my controller for the MVC framework.  Routes will be found here.

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//If this comes after f3 autoload then it overwrites the f3 call to session_start() and vice-versa:
// So, having it before is useless and session manipulation will have to be done through f3
//Start a session
session_start();

//Require autoload file
require_once('vendor/autoload.php');

//Instantiate the F3 Base class
$f3 = Base::instance();

//https://fatfreeframework.com/3.5/routing-engine#TheF3Autoloader
$f3->set('AUTOLOAD','controllers/');

//Define a default route
$f3->route('GET /', function (){ HomePage::display(); });

//Define a default route
$f3->route('GET /home', function (){ HomePage::display(); });

//Define a route to start the application
$f3->route('GET /start', function ($f3){ PersonalInfo::display($f3); });

//Define a route to handle the application start page submission
$f3->route('POST /start', function () { PersonalInfo::respond(); });

//Defines route to display the experience page
$f3->route('GET /experience', function () { Experience::display(); });

//Defines route to handle the experience page submission
$f3->route('POST /experience', function () { Experience::respond(); });

//Defines route to display the mailing lists page
$f3->route('GET /mailingLists', function ($f3) { MailingLists::display($f3); });

//Defines route to handle the mailing lists page submission
$f3->route('POST /mailingLists', function () { MailingLists::respond(); });

//Defines route to display the summary page
$f3->route('GET /summary', function ($f3) { Summary::display($f3); });

//Defines route to handle the summary page submission
$f3->route('POST /summary', function () { Summary::respond(); });




//Route for testing footer
$f3->route('GET /footer', function (){
    //Instantiate a view
    $view = new Template();
    echo $view->render("views/stickyFooterTest.html");
});

//Route for work done in class
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

