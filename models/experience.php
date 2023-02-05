<?php

$postedObj = json_decode($_SESSION['experience']);

$obj = new stdClass();
$obj->error = false;

if($postedObj->github == "Batman"){
    $obj->error = true;
    $obj->message = "Sorry, Batman is not a link.";
    echo json_encode($obj);
}else{
    $obj->message = "Cool story.";
    echo json_encode($obj);
}
