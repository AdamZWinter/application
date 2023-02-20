<?php
class Summary
{
    static function display($f3){

        $mailingLists = "";
        if(array_key_exists('mailingLists', $_SESSION)){
            $mailingListsObj = json_decode($_SESSION['mailingLists']);
            $jobsArray = $mailingListsObj->jobsArray;
            $verticalsArray = $mailingListsObj->verticalsArray;
            $mailingListsArray = array_merge($jobsArray, $verticalsArray);

            if(!empty($mailingListsArray)){
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
    }

    static function respond(){

        $obj = new stdClass();
        $obj->error = false;
    }

}