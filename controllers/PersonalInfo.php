<?php

//namespace JobApplication;

class PersonalInfo
{
    static function display($f3){
        require('constants/states.php');
        //echo json_encode($states);
        $f3->set('states',$STATES);
        //Instantiate a view
        $view = new \Template();
        echo $view->render("views/personalInfo.html");
        return true;
    }
}