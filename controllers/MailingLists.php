<?php
use JobApplication\MailingListsObj;

class MailingLists
{
    static function display($f3){
        require('constants/mailingLists.php');
        $f3->set('jobs',$JOBS);
        $f3->set('verticals',$VERTICALS);
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/mailingLists.html");
    }

    static function respond(){
        $obj = new stdClass();  // the \ backslash in front of stdClass tells it to use the PHP global namespace
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