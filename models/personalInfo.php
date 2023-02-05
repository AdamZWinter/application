<?php

$personalInfoObj = json_decode($_SESSION['personalInfo']);

$obj = new stdClass();
$obj->error = false;

if($personalInfoObj->fname == "Batman"){
    $obj->error = true;
    $obj->message = "Sorry, you cannot be Batman.";
    echo json_encode($obj);
}else{
    $obj->message = "Cool name.";
    echo json_encode($obj);
}
