<?php

namespace JobApplication;

class Applicant_SubscribedToLists extends Applicant
{
    private $_selectionsJob = null;
    private $_selectionsVerticals = null;

//    public function __construct($fname = null, $lname = null, $email = null, $phone = null, $state = null)
//    {
//        parent::__construct($fname, $lname, $email, $phone, $state);
//    }

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

    public function __serialize()
    {
        $assoc = [];
        $assoc['fname'] = $this->getFname();
        $assoc['lname'] = $this->getLname();
        $assoc['email'] = $this->getBio();
        $assoc['phone'] = $this->getPhone();
        $assoc['state'] = $this->getState();
        $assoc['experience'] = $this->getExperience();
        $assoc['bio'] = $this->getBio();
        $assoc['github'] = $this->getGithub();
        $assoc['relocate'] = $this->getRelocate();
        $assoc['jobs'] = $this->getSelectionsJob();
        $assoc['verticals'] = $this->getSelectionsVerticals();

        return $assoc;
    }

    public function __unserialize($data)
    {
        $this->setFname($data['fname']);
        $this->setLname($data['lname']);
        $this->setEmail($data['email']);
        $this->setPhone($data['phone']);
        $this->setState($data['state']);
        $this->setExperience($data['experience']);
        $this->setBio($data['bio']);
        $this->setGithub($data['github']);
        $this->setRelocate($data['relocate']);
        $this->setSelectionsJob($data['jobs']);
        $this->setSelectionsVerticals($data['verticals']);
    }


}