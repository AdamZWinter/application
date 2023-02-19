<?php
class HomePage
{
    static function display(){
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/home.html");
        return true;
    }

}