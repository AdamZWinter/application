<?php

use JobApplication\ExperienceObj;

class Experience
{
    static function display(){
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/experience.html");
    }

    static function respond(){
        $obj = new stdClass();
        $obj->error = false;

        $experienceObject = new ExperienceObj($_POST['JSONpayload'], $obj);
        $experienceObject->validGithub();
        $experienceObject->validExperience();
        $experienceObject->sanitizeInputs();
        $experienceObject->notBatman();

        //Move data to SESSION array after validation
        $_SESSION['experience'] = $experienceObject->getJSONencoded();

        //respond to the client
        echo json_encode($experienceObject->getObj());
    }

}