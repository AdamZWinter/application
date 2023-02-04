<?php

//echo $_SESSION['mailingLists'];

$postedObj = json_decode($_SESSION['mailingLists']);

$obj = new stdClass();
$obj->error = false;

$jobsArray = $postedObj->jobsArray;

$obj->message = $jobsArray[0];  //not really used, only here for testing purpose, only gets displayed momentarily before redirect

//echo "response from php";
echo json_encode($obj);

//if($postedObj->??? == "Batman"){
//    $obj->error = true;
//    $obj->message = "Sorry, Batman is not a link.";
//    echo json_encode($obj);
//}else{
//    $obj->message = "Cool story.";
//    echo json_encode($obj);
//}
