<?php

namespace JobApplication;

class DataLayer
{

    private $dbh;
    function __construct(){
        require($_SERVER['HOME'].'/conf.php');
        try {
            $this->dbh = new \PDO(DB_DRIVER, DB_USER, PASSWORD);
            echo 'DB connection successful.';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function saveOrder($orderObj)
    {
        $sql = "INSERT INTO `orders`(`food`, `meal`, `condiments`) VALUES (:food, :meal, :condiments)";

    }

    static function getJobsList()
    {
        return array("JavaScript", "PHP", "Java", "Python", "HTML", "CSS", "ReactJS", "NodeJS");
    }

    static function getVerticalsList()
    {
        return array("SaaS", "Health-tech", "Ag-tech", "HR-tech", "Industrial-tech", "Cybersecurity");
    }

    static function getStates()
    {
        $noKeys = array("Alabama", "Alaska", "American Samoa", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "District of Columbia", "Florida", "Georgia", "Guam", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Minor Outlying Islands", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Northern Mariana Islands", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Puerto Rico", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "U.S. Virgin Islands", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming");
        $states = [];

        for($i = 0; $i < count($noKeys); $i++){
            //echo $states[$i].PHP_EOL;
            $states[$i+1] = $noKeys[$i];
        }
        return $states;
    }

}
