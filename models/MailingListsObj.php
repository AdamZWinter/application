<?php
namespace JobApplication;
class MailingListsObj extends PostedObj
{
    protected $jobsArray;
    protected $verticalsArray;
    function __construct($JSONpayload, $obj){
        parent::__construct($JSONpayload, $obj);
        $this->jobsArray = $this->decodedObj->jobsArray;
        $this->verticalsArray = $this->decodedObj->verticalsArray;
    }

    public function validSelectionsJobs(){
        require('constants/mailingLists.php');
        foreach($this->jobsArray as $job){
            if(!in_array($job, DataLayer::getJobsList())){
                $this->obj->error = true;
                $this->obj->message = 'Possible Spoofing: Submission includes a job that is not an acceptable value.';
                echo json_encode($this->obj);
                exit;
            }
        }
    }

    public function validSelectionsVerticals(){
        require('constants/mailingLists.php');
        foreach($this->verticalsArray as $vertical){
            if(!in_array($vertical, DataLayer::getVerticalsList())){
                $this->obj->error = true;
                $this->obj->message = 'Possible Spoofing: Submission includes a vertical that is not an acceptable value.';
                echo json_encode($this->obj);
                exit;
            }
        }
    }



}