<?php

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
     * @param $f3 $f3 = Base::instance()
     * @return void
     */
    static function get($f3){

        $f3->sync('SESSION');
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/admin.html");
    }

    static function getApplicants()
    {
        $response = new stdClass();
        $response->error = false;
        $response->message = 'no errors';

        $dataArray = [];
        $dataArray[] = Array('1', '2', '3', '4', '5', '<a href="https://github.com">Github</a>', '7', '8', '9', '10', '11', '12');
        $dataArray[] = Array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');

        $response->data = $dataArray;
        //$length = strlen($responseCopy);
        //header('Content-Length: '.$length);
        header('Content-type: application/json');

        echo json_encode($response);
    }
}