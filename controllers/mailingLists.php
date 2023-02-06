<?php

use JobApplication\MailingListsObj;  //You still have to use the use statement to specify the classes to import
                                    //psr-4 autoloading does not just find the class for you
                                    //classmap would, however, find the class for you, but there are no namespaces available

//require_once('models/PostedObj.php');
//require_once('models/MailingListsObj.php');
//$postedObj = json_decode($_POST['JSONpayload']);

$obj = new stdClass();
$obj->error = false;

$mailingListsObject = new MailingListsObj($_POST['JSONpayload'], $obj);
$mailingListsObject->validSelectionsJobs();
$mailingListsObject->validSelectionsVerticals();


//Move data to SESSION array after validation
$_SESSION['mailingLists'] = $mailingListsObject->getJSONencoded();

//respond to the client
echo json_encode($mailingListsObject->getObj());


