<?php

$obj = new \stdClass();  // the \ backslash in front of stdClass tells it to use the PHP global namespace
$obj->error = false;

$personalInfoObj = json_decode($_SESSION['personalInfo']);
$experienceObj = json_decode($_SESSION['experience']);
$mailingListsObj = json_decode($_SESSION['mailingLists']);

$_SESSION["fname"] = $personalInfoObj->fname;
$_SESSION["lname"] = $personalInfoObj->lname;
$_SESSION["email"] = $personalInfoObj->email;
$_SESSION["phone"] = $personalInfoObj->phone;
$_SESSION["state"] = $personalInfoObj->state;

$_SESSION["biography"] = $experienceObj->biography;
$_SESSION["github"] = $experienceObj->github;
$_SESSION["years"] = $experienceObj->years;
$_SESSION["relocate"] = $experienceObj->relocate;

$jobsArray = $mailingListsObj->jobsArray;
$verticalsArray = $mailingListsObj->verticalsArray;
$mailingListsArray = array_merge($jobsArray, $verticalsArray);

$mailingLists = "";
if(!empty($mailingListsArray)){
    foreach ($mailingListsArray as $category){
        $mailingLists = $mailingLists.", ".$category;
    }
    $mailingLists = ltrim($mailingLists, ', ');
}else{
    $mailingLists = "none";
}


$_SESSION["mailingListsString"] = $mailingLists;

