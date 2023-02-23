<?php
use JobApplication\MailingListsObj;
use JobApplication\DataLayer;
use JobApplication\Applicant;
use JobApplication\Applicant_SubscribedToLists;

class MailingLists
{
    static function display($f3){
        require('constants/mailingLists.php');
        $f3->set('jobs', DataLayer::getJobsList());
        $f3->set('verticals',DataLayer::getVerticalsList());
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/mailingLists.html");
    }

    static function respond(){
        $obj = new stdClass();
        $obj->error = false;

        $mailingListsObject = new MailingListsObj($_POST['JSONpayload'], $obj);
        $mailingListsObject->validSelectionsJobs();
        $mailingListsObject->validSelectionsVerticals();

        $mailingObj = $mailingListsObject->getDecodedObject();
        $applicant = unserialize($_SESSION["applicant"]);
        $applicant->setSelectionsJob($mailingObj->jobsArray);
        $applicant->setSelectionsVerticals($mailingObj->verticalsArray);
        $_SESSION["applicant"] = serialize($applicant);

        //respond to the client
        echo json_encode($mailingListsObject->getObj());
    }
}