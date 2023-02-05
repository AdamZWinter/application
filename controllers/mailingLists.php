<?php

require_once('models/PostedObj.php');
require_once('models/MailingListsObj.php');

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


