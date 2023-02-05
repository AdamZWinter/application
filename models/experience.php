<?php

$postedObj = json_decode($_POST['JSONpayload']);

$obj = new stdClass();
$obj->error = false;

$postedObj->biography = filter_var($postedObj->biography, FILTER_SANITIZE_STRING);

if(!filter_var($postedObj->github, FILTER_VALIDATE_URL)){
    $obj->error = true;
    $obj->message = "Invalid github URL.";
    echo json_encode($obj);
    exit;
}

$postedObj->years = filter_var($postedObj->years, FILTER_SANITIZE_STRING);
$postedObj->relocate = filter_var($postedObj->relocate, FILTER_SANITIZE_STRING);

if($postedObj->biography == "Batman"){
    $obj->error = true;
    $obj->message = "Sorry, Batman is not going to be enough.";
    echo json_encode($obj);
}else{
    $obj->message = "Cool story.";
    echo json_encode($obj);
}

//Move data from POST array to SESSION array after having been sanitized and validated
$_SESSION['experience'] = json_encode($postedObj);