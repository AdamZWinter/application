<?php
use JobApplication\MailingListsObj;
use JobApplication\DataLayer;
use JobApplication\Applicant;
use JobApplication\Applicant_SubscribedToLists;

/**
 *  controller for GET and POST to the mailingLists route
 *
 * @param  $f3 $f3 = Base::instance()
 * @author Adam Winter
 */
class MailingLists
{
    /**
     * Controller method for the mailingLists route GET
     *
     * @return void
     */
    static function display($f3)
    {
        //include 'constants/mailingLists.php';
        $f3->set('jobs', DataLayer::getJobsList());
        $f3->set('verticals', DataLayer::getVerticalsList());
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/mailingLists.html");
    }

    /**
     * Controller method for the mailingLists route POST
     *
     * Requires $_POST['JSONpayload'], json-encoded associative array of the
     * form values being posted
     *
     * @return void
     */
    static function respond()
    {
        $obj = new stdClass();
        $obj->error = false;

        $mailingListsObject = new MailingListsObj($_POST['JSONpayload'], $obj);
        $mailingListsObject->validSelectionsJobs();
        $mailingListsObject->validSelectionsVerticals();

        $mailingObj = $mailingListsObject->getDecodedObject();
        $applicant = $_SESSION["applicant"];
        $applicant->setSelectionsJob($mailingObj->jobsArray);
        $applicant->setSelectionsVerticals($mailingObj->verticalsArray);
        $_SESSION["applicant"] = $applicant;

        //respond to the client
        echo json_encode($mailingListsObject->getObj());
    }
}
