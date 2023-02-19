<?php

//namespace JobApplication;

class HomePage
{
    static function display(){
        //Instantiate a view
        $view = new \Template();                    //backslash in front of Template() is required for namespace
        echo $view->render("views/home.html");
        return true;
    }

}