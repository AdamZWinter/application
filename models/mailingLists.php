<?php

$postedObj = json_decode($_POST['JSONpayload']);

$obj = new stdClass();
$obj->error = false;

$jobsArray = $postedObj->jobsArray;
$verticalsArray = $postedObj->verticalsArray;

require_once('constants/mailingLists.php');
foreach($jobsArray as $job){
    if(!in_array($job, $JOBS)){
        $obj->error = true;
        $obj->message = 'Possible Spoofing: Submission includes a job that is not an acceptable value.';
        echo json_encode($obj);
        exit;
    }
}

foreach($verticalsArray as $vertical){
    if(!in_array($vertical, $VERTICALS)){
        $obj->error = true;
        $obj->message = 'Possible Spoofing: Submission includes a vertical that is not an acceptable value.';
        echo json_encode($obj);
        exit;
    }
}

$obj->message = 'OK';

//Move data from POST array to SESSION array
$_SESSION['mailingLists'] = $_POST['JSONpayload'];

//echo "response from php";
echo json_encode($obj);

