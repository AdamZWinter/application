<?php

$personalInfoObj = json_decode($_POST['JSONpayload']);

$obj = new stdClass();
$obj->error = false;

if(!ctype_alpha($personalInfoObj->fname)){
    $obj->error = true;
    $obj->message = "Names can only contain letters";
    echo json_encode($obj);
    exit;
}

if(!ctype_alpha($personalInfoObj->lname)){
    $obj->error = true;
    $obj->message = "Names can only contain letters";
    echo json_encode($obj);
    exit;
}

if(!filter_var($personalInfoObj->email, FILTER_VALIDATE_EMAIL)){
    $obj->error = true;
    $obj->message = "Invalid email address.";
    echo json_encode($obj);
    exit;
}

$personalInfoObj->phone = filter_var($personalInfoObj->phone, FILTER_SANITIZE_STRING);

require_once('constants/states.php');
if(!in_array($personalInfoObj->state, $STATES)){
    $obj->error = true;
    $obj->message = 'Possible Spoofing: Submission includes a state value that is not acceptable';
    echo json_encode($obj);
    exit;
}

if($personalInfoObj->fname == "Batman"){
    $obj->error = true;
    $obj->message = "Sorry, you cannot be Batman.";
    echo json_encode($obj);
}else{
    $obj->message = "Cool name.";
    echo json_encode($obj);
}

//Move data from POST array to SESSION array
$_SESSION['personalInfo'] = json_encode($personalInfoObj);
