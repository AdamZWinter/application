<?php

require_once('models/PostedObj.php');
require_once('models/ExperienceObj.php');

//$postedObj = json_decode($_POST['JSONpayload']);

$obj = new stdClass();
$obj->error = false;

$experienceObject = new ExperienceObj($_POST['JSONpayload'], $obj);
$experienceObject->validGithub();
$experienceObject->validExperience();
$experienceObject->sanitizeInputs();
$experienceObject->notBatman();

//Move data to SESSION array after validation
$_SESSION['experience'] = $experienceObject->getJSONencoded();

//respond to the client
echo json_encode($experienceObject->getObj());

