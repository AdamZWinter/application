<?php
namespace JobApplication;
//use JobApplication\ExperienceObj;  //You can use the use statement to specify the classes to import
                                    //psr-4 autoloading does not auto find the class for you unless you specify the namespace
                                    //classmap would, however, find the class for you, but there are no namespaces available

//require_once('models/PostedObj.php');
//require_once('models/ExperienceObj.php');
//$postedObj = json_decode($_POST['JSONpayload']);

$obj = new \stdClass();  // the \ backslash in front of stdClass tells it to use the PHP global namespace
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

