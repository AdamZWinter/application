<?php

/**
 *  controller for GET and POST to the summary route
 *
 * @author Adam Winter
 */
class Summary
{
    /**
     * Controller method for the summary route GET
     *
     * @param  $f3 $f3 = Base::instance()
     * @return void
     */
    static function display($f3)
    {

        //Write to Database here so that any error can be displayed

        $mailingLists = "";
        if(array_key_exists('mailingLists', $_SESSION)) {
            $mailingListsObj = json_decode($_SESSION['mailingLists']);
            $jobsArray = $mailingListsObj->jobsArray;
            $verticalsArray = $mailingListsObj->verticalsArray;
            $mailingListsArray = array_merge($jobsArray, $verticalsArray);

            if(!empty($mailingListsArray)) {
                foreach ($mailingListsArray as $category){
                    $mailingLists = $mailingLists.", ".$category;
                }
                $mailingLists = ltrim($mailingLists, ', ');
            }else{
                $mailingLists = "none";
            }
        }else{
            $mailingLists = "none";
        }

        $_SESSION["mailingListsString"] = $mailingLists;

        $f3->sync('SESSION');
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/summary.html");

        session_destroy();
    }

    /**
     * Controller method for the summary route POST
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
    }

}
