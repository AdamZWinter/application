<?php

require_once('models/PostedObj.php');
require_once('models/PersonalInfoObj.php');

//$personalInfoObj = json_decode($_POST['JSONpayload']);

$obj = new stdClass();
$obj->error = false;

$personalInfoObject = new PersonalInfoObj($_POST['JSONpayload'], $obj);
$personalInfoObject->validName();
$personalInfoObject->validEmail();
$personalInfoObject->validPhone();
$personalInfoObject->validState();
$personalInfoObject->notBatman();


//Move data from POST array to SESSION array after validation
$_SESSION['personalInfo'] = $personalInfoObject->getJSONencoded();

//respond to the client
echo json_encode($personalInfoObject->getObj());




