<?php

namespace JobApplication;

class Applicant_SubscribedToLists extends Applicant
{
    private $_selectionsJob = null;
    private $_selectionsVerticals = null;
    private $_lists;

    /**
     * @return mixed
     */
    public function getLists()
    {
        return $this->_lists;
    }

    /**
     * @param mixed $lists
     */
    public function setLists($lists)
    {
        $this->_lists = $lists;
    }

    /**
     * @return mixed
     */
    public function getSelectionsJob()
    {
        return $this->_selectionsJob;
    }

    /**
     * @param mixed $selectionsJob
     */
    public function setSelectionsJob($selectionsJob)
    {
        $this->_selectionsJob = $selectionsJob;
    }

    /**
     * @return mixed
     */
    public function getSelectionsVerticals()
    {
        return $this->_selectionsVerticals;
    }

    /**
     * @param mixed $selectionsVerticals
     */
    public function setSelectionsVerticals($selectionsVerticals)
    {
        $this->_selectionsVerticals = $selectionsVerticals;
    }

    public function getListsString()
    {
        $mailingLists = "";
        $jobsArray = $this->getSelectionsJob();
        $verticalsArray = $this->getSelectionsVerticals();
        $mailingListsArray = array_merge($jobsArray, $verticalsArray);

        if(!empty($mailingListsArray)) {
            foreach ($mailingListsArray as $category){
                $mailingLists = $mailingLists.", ".$category;
            }
            $mailingLists = ltrim($mailingLists, ', ');
        }else{
            $mailingLists = "none";
        }
        $this->setLists($mailingLists);
        return $mailingLists;
    }

    //    public function toArray(){
    //        $applicantArray = [];
    //        $applicantArray[] = $this->getId();
    //        $applicantArray[] = $this->getFname();
    //        $applicantArray[] = $this->getLname();
    //        $applicantArray[] = $this->getEmail();
    //        $applicantArray[] = $this->getPhone();
    //        $applicantArray[] = $this->getState();
    //        $applicantArray[] = $this->getGithub();
    //        $applicantArray[] = $this->getExperience();
    //        $applicantArray[] = $this->getRelocate();
    //        $applicantArray[] = $this->getBio();
    //        $applicantArray[] = $this->getPhoto();
    //        $applicantArray[] = $this->getLists();
    //
    //        return $applicantArray;
    //    }

    public function constructFromDatabase($assoc)
    {
        $this->setId($assoc['id']);
        $this->setFname($assoc['fname']);
        $this->setLname($assoc['lname']);
        $this->setEmail($assoc['email']);
        $this->setPhone($assoc['phone']);
        $this->setState($assoc['state']);
        $this->setGithub($assoc['github']);
        $this->setExperience($assoc['experience']);
        $this->setRelocate($assoc['relocate']);
        $this->setBio($assoc['bio']);
        $this->setPhoto($assoc['photo']);
        $this->_lists = $assoc['mailing_lists_subscriptions'];
    }


    //    public function __serialize()
    //    {
    //        $assoc = [];
    //        $assoc['fname'] = $this->getFname();
    //        $assoc['lname'] = $this->getLname();
    //        $assoc['email'] = $this->getBio();
    //        $assoc['phone'] = $this->getPhone();
    //        $assoc['state'] = $this->getState();
    //        $assoc['experience'] = $this->getExperience();
    //        $assoc['bio'] = $this->getBio();
    //        $assoc['github'] = $this->getGithub();
    //        $assoc['relocate'] = $this->getRelocate();
    //        $assoc['jobs'] = $this->getSelectionsJob();
    //        $assoc['verticals'] = $this->getSelectionsVerticals();
    //
    //        return $assoc;
    //    }
    //
    //    public function __unserialize($data)
    //    {
    //        $this->setFname($data['fname']);
    //        $this->setLname($data['lname']);
    //        $this->setEmail($data['email']);
    //        $this->setPhone($data['phone']);
    //        $this->setState($data['state']);
    //        $this->setExperience($data['experience']);
    //        $this->setBio($data['bio']);
    //        $this->setGithub($data['github']);
    //        $this->setRelocate($data['relocate']);
    //        $this->setSelectionsJob($data['jobs']);
    //        $this->setSelectionsVerticals($data['verticals']);
    //    }


}
