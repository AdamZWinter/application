<?php

namespace JobApplication;

class DataLayer
{

    private $_dbh;
    function __construct(){
        require($_SERVER['HOME'].'/conf.php');
        try {
            $this->_dbh = new \PDO(DB_DRIVER, DB_USER, PASSWORD);
            echo 'DB connection successful.';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function insertApplicant($applicant)
    {
        //$applicant = new Applicant();
        $sql = "INSERT INTO `applicants`(`id`, `fname`, `lname`, `email`, `phone`, `state`, `github`, 
                                        `experience`, `relocate`, `bio`, `photo`, `mailing_lists_signup`, `mailing_lists_subscriptions`) 
                    VALUES (null, :fname, :lname, :email, :phone, :state, :github, :experience, :relocate, :bio, :photo, :subscribed, :lists)";
        $stmt = $this->_dbh->prepare($sql);

        $lname = $applicant->getFname();
        $fname = $applicant->getLname();
        $email = $applicant->getEmail();
        $phone = $applicant->getPhone();
        $state = $applicant->getState();
        $github = $applicant->getGithub();
        $experience = $applicant->getExperience();
        $relocate = $applicant->getRelocate();
        $bio = $applicant->getBio();
        $photo = $applicant->getPhoto();
        $subscribed = is_a($applicant, Applicant_SubscribedToLists::class) ? 1 : 0;
        $lists = $subscribed ? $applicant->getListsString() : "none";

        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':github', $github);
        $stmt->bindParam(':experience', $experience);
        $stmt->bindParam(':relocate', $relocate);
        $stmt->bindParam(':bio', $bio);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':subscribed', $subscribed);
        $stmt->bindParam(':lists', $lists);

        $stmt->execute();
        if($stmt->rowCount() == 1){
            return $this->_dbh->lastInsertId();
        }else{
            return -1;
        }

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
