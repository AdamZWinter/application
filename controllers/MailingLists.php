<?php
use JobApplication\MailingListsObj;
use JobApplication\DataLayer;

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

        //Move data to SESSION array after validation
        $_SESSION['mailingLists'] = $mailingListsObject->getJSONencoded();

        //respond to the client
        echo json_encode($mailingListsObject->getObj());
    }
}