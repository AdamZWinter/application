<?php

use JobApplication\Applicant_SubscribedToLists;
use JobApplication\DataLayer;

/**
 *  controller for GET and POST to the admin route
 *
 * @author Adam Winter
 */
class Admin
{
    /**
     * Controller method for the admin route GET
     *
     * @param  $f3 $f3 = Base::instance()
     * @return void
     */
    static function get($f3)
    {

        $f3->sync('SESSION');
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/admin.html");
    }

    static function getApplicantsAsArrayData()
    {
        $response = new stdClass();
        $response->error = false;
        $response->message = 'no errors';

        //        $dataArray = [];
        //        $dataArray[] = Array('1', '2', '3', '4', '5', '<a href="https://github.com">Github</a>', '7', '8', '9', '10', '11');
        //        $dataArray[] = Array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11');

        $dataLayer = new DataLayer();
        $applicants = $dataLayer->getAllApplicantIDs();

        $dataArray = [];
        foreach ($applicants as $id){
            $applicant = $dataLayer->getApplicantByID($id);
            //var_dump($applicant);
            $asArray = $applicant->toArray();
            $asArray[6] = '<a href="'.$asArray[6].'">Github</a>';
            $asArray[9] = '<a href="applicant/'.$id.'">Biography</a>';
            $asArray[10] = '<a href="applicant/'.$id.'">Profile</a>';
            if(is_a($applicant, Applicant_SubscribedToLists::class)) {
                $asArray[] = '<a href="applicant/'.$id.'">Lists</a>';
            }else{
                $asArray[] = '';
            }
            $dataArray[] = $asArray;
        }
        //        echo '<pre>';
        //        var_dump($dataArray);
        //        echo '</pre>';

        $response->data = $dataArray;
        //$length = strlen($responseCopy);
        //header('Content-Length: '.$length);
        header('Content-type: application/json');

        echo json_encode($response);
    }

    static function applicant($f3)
    {
        $dataLayer = new DataLayer();
        $applicant = $dataLayer->getApplicantByID($f3->get('PARAMS.id'));
        //$_SESSION['displayID'] = $f3->get('PARAMS.id');
        $_SESSION['applicant'] = $applicant;
        if(is_a($applicant, Applicant_SubscribedToLists::class)) {
            $_SESSION['mailingListsString'] = $applicant->getLists();
        }else{
            $_SESSION['mailingListsString'] = 'none';
        }
        $f3->sync('SESSION');
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/applicant.html");
    }

}
