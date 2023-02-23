<?php

namespace JobApplication;

class Applicant
{

    private $_fname;
    private $_lname;
    private $_email;
    private $_phone;
    private $_state;
    private $_github = null;
    private $_experience = null;
    private $_relocate = null;
    private $_bio = null;

    /**
     * @param $_fname  Applicant first name
     * @param $_lname  Applicant last name
     * @param $_email  Applicant email
     * @param $_phone  Applicant phone
     * @param $_state  Applicant state
     */
    public function __construct($fname = null, $lname = null, $email = null, $phone = null, $state = null)
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_email = $email;
        $this->_phone = $phone;
        $this->_state = $state;
    }

    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @return mixed
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @return mixed
     */
    public function getGithub()
    {
        return $this->_github;
    }

    /**
     * @param mixed $github
     */
    public function setGithub($github)
    {
        $this->_github = $github;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->_experience;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience($experience)
    {
        $this->_experience = $experience;
    }

    /**
     * @return mixed
     */
    public function getRelocate()
    {
        return $this->_relocate;
    }

    /**
     * @param mixed $relocate
     */
    public function setRelocate($relocate)
    {
        $this->_relocate = $relocate;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * @param mixed $bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function __serialize()
    {
        $assoc = [];
        $assoc['fname'] = $this->_fname;
        $assoc['lname'] = $this->_lname;
        $assoc['email'] = $this->_email;
        $assoc['phone'] = $this->_phone;
        $assoc['state'] = $this->_state;
        $assoc['experience'] = $this->_experience;
        $assoc['bio'] = $this->_bio;
        $assoc['github'] = $this->_github;
        $assoc['relocate'] = $this->_relocate;
        return $assoc;
    }

    public function __unserialize($data)
    {
        $this->_fname = $data['fname'];
        $this->_lname = $data['lname'];
        $this->_email = $data['email'];
        $this->_phone = $data['phone'];
        $this->_state = $data['state'];
        $this->_experience = $data['experience'];
        $this->_bio = $data['bio'];
        $this->_github = $data['github'];
        $this->_relocate = $data['relocate'];
    }


}