<?php

use JobApplication\ExperienceObj;
use JobApplication\Applicant;
use JobApplication\Applicant_SubscribedToLists;

/**
 *  controller for GET and POST to the experience route
 *
 * @author Adam Winter
 */
class Experience
{
    /**
     * Controller method for the experience route GET
     *
     * @return void
     */
    static function display()
    {
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/experience.html");
    }

    /**
     * Controller method for the experience route POST
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

        $experienceObject = new ExperienceObj($_POST['JSONpayload'], $obj);
        $experienceObject->validGithub();
        $experienceObject->validExperience();
        $experienceObject->sanitizeInputs();
        $experienceObject->notBatman();

        $experienceObj = $experienceObject->getDecodedObject();

        //$applicant = new Applicant();
        //$applicant = unserialize($_SESSION["applicant"]);
        $applicant = $_SESSION["applicant"];
        $applicant->setGithub($experienceObj->github);
        $applicant->setExperience($experienceObj->years);
        $applicant->setBio($experienceObj->biography);
        $applicant->setRelocate($experienceObj->relocate);
        $_SESSION["applicant"] = $applicant;

        $_SESSION["biography"] = $experienceObj->biography;
        $_SESSION["github"] = $experienceObj->github;
        $_SESSION["years"] = $experienceObj->years;
        $_SESSION["relocate"] = $experienceObj->relocate;

        setcookie('biography', $_SESSION["biography"]);
        setcookie('github', $_SESSION["github"]);
        setcookie('years', $_SESSION["years"]);
        setcookie('relocate', $_SESSION["relocate"]);

        //respond to the client
        echo json_encode($experienceObject->getObj());
    }

}
