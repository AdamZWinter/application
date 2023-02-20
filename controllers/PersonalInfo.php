<?php
use JobApplication\PersonalInfoObj;
use JobApplication\DataLayer;

class PersonalInfo
{
    static function display($f3){
        require('constants/states.php');
        //echo json_encode($states);
        $f3->set('states', DataLayer::getStates());
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/personalInfo.html");
        return true;
    }

    static function respond(){
        $obj = new stdClass();
        $obj->error = false;

        $personalInfoObject = new PersonalInfoObj($_POST['JSONpayload'], $obj);
        $personalInfoObject->validName();
        $personalInfoObject->validEmail();
        $personalInfoObject->validPhone();
        $personalInfoObject->validState();
        $personalInfoObject->validMailing();
        $personalInfoObject->notBatman();


        //Move data from POST array to SESSION array after validation
        $_SESSION['personalInfo'] = $personalInfoObject->getJSONencoded();

        $personalInfoObj = $personalInfoObject->getDecodedObject();
        //$personalInfoObj = json_decode($_SESSION['personalInfo']);
        $_SESSION["fname"] = $personalInfoObj->fname;
        $_SESSION["lname"] = $personalInfoObj->lname;
        $_SESSION["email"] = $personalInfoObj->email;
        $_SESSION["phone"] = $personalInfoObj->phone;
        $_SESSION["state"] = $personalInfoObj->state;
        $_SESSION["mailing"] = $personalInfoObj->mailing;

        setcookie('fname', $_SESSION["fname"]);
        setcookie('lname', $_SESSION["lname"]);
        setcookie('email', $_SESSION["email"]);
        setcookie('phone', $_SESSION["phone"]);
        setcookie('state', $_SESSION["state"]);
        setcookie('mailing', $_SESSION["mailing"]);

        //respond to the client
        echo json_encode($personalInfoObject->getObj());
    }//end respond()

}//end class