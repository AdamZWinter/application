<?php
use JobApplication\Applicant;
use JobApplication\Applicant_SubscribedToLists;
use JobApplication\DataLayer;

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
     * @param $f3 $f3 = Base::instance()
     * @return void
     */
    static function display($f3){
        $errors = [];
        if(empty($_SESSION["applicant"])){
            $errors[] = 'This page has timed out.';
            $errors[] = 'The information for this page is no longer available.';
            $_SESSION['errors'] = $errors;
            $f3->reroute('error');
        }
        $applicant = $_SESSION["applicant"];

        //Write to Database here so that any error can be displayed


        if(is_a($applicant, 'JobApplication\Applicant_SubscribedToLists')){
            $_SESSION["mailingListsString"] = $applicant->getListsString();
        }else{
            $_SESSION["mailingListsString"] = "none";
        }

        $f3->sync('SESSION');
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/summary.html");

        //session_destroy();
    }

    /**
     * Controller method for the summary route POST
     *
     * Requires $_POST['the_file'], the uploaded file that should be photo of applicant
     *
     * @return void
     */
    static function respond($f3){

        $obj = new stdClass();
        $obj->error = false;

        $destination = 'images/userUploads/';
        $uploaded_file = $destination.$_FILES['the_file']['name'];


        if (is_uploaded_file($_FILES['the_file']['tmp_name']))
        {
            $mime_type = mime_content_type($_FILES['the_file']['tmp_name']);
            // allow certain files
            //https://www.php.net/manual/en/function.image-type-to-mime-type.php
            $allowed_file_types = ['image/png', 'image/jpeg', 'image/gif', 'image/bmp'];
            if (! in_array($mime_type, $allowed_file_types)) {
                echo 'Incorrect file type.  ';
                exit;
            }

            if (!move_uploaded_file($_FILES['the_file']['tmp_name'], $uploaded_file))
            {
                echo 'Problem:  Could not move temp file to destination.  ';
                exit;
            }
            else
            {
                $_SESSION['applicant']->setPhoto($_FILES['the_file']['name']);
                $_SESSION['photo'] = $_FILES['the_file']['name'];

                $f3->sync('SESSION');
                //Instantiate a view
                $view = new Template();
                echo $view->render("views/summary.html");

            }
        }

    }


}