<?php

namespace JobApplication;

/**
 *  Model for an applicant of a job / opportunity / internship
 *
 * @author Adam Winter
 */
class Applicant
{
    private $_id;
    private $_fname;
    private $_lname;
    private $_email;
    private $_phone;
    private $_state;
    private $_github = null;
    private $_experience = null;
    private $_relocate = null;
    private $_bio = null;
    private $_photo;

    /**
     * @param $_fname String first name, defaults to null
     * @param $_lname String last name, defaults to null
     * @param $_email String email, defaults to null
     * @param $_phone String phone, defaults to null
     * @param $_state String state, defaults to null
     */
    public function __construct($fname = null, $lname = null, $email = null, $phone = null, $state = null)
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_email = $email;
        $this->_phone = $phone;
        $this->_state = $state;
        $this->_photo = 'somebody.jpg';
    }

    /**
     * @return String first name
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * @param String $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @return String Last name
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * @param String $lname Last name
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * @return String email address
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param String $email Email address
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return String Phone number
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param String $phone Phone number
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return String State or providence of the USA
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param String $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @return String github.com URL to applicant github account
     */
    public function getGithub()
    {
        return $this->_github;
    }

    /**
     * @param String $github github.com URL to applicant github account
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

    /**
     * @return null
     */
    public function getPhoto()
    {
        return $this->_photo;
    }

    /**
     * @param null $photo
     */
    public function setPhoto($photo)
    {
        $this->_photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    public function toArray()
    {
        $applicantArray = [];
        $applicantArray[] = $this->getId();
        $applicantArray[] = $this->getFname();
        $applicantArray[] = $this->getLname();
        $applicantArray[] = $this->getEmail();
        $applicantArray[] = (string)$this->getPhone();
        $applicantArray[] = $this->getState();
        $applicantArray[] = $this->getGithub();
        $applicantArray[] = $this->getExperience();
        $applicantArray[] = $this->getRelocate();
        $applicantArray[] = $this->getBio();
        $applicantArray[] = $this->getPhoto();
        return $applicantArray;
    }

    public function constructFromDatabase($assoc)
    {
        $this->_id = $assoc['id'];
        $this->_fname = $assoc['fname'];
        $this->_lname = $assoc['lname'];
        $this->_email = $assoc['email'];
        $this->_phone = $assoc['phone'];
        $this->_state = $assoc['state'];
        $this->_github = $assoc['github'];
        $this->_experience = $assoc['experience'];
        $this->_relocate = $assoc['relocate'];
        $this->_bio = $assoc['bio'];
        $this->_photo = $assoc['photo'];
    }





    //    /** For all functions that call this method
    //     * or anything that calls the serialize method
    //     *
    //     * @return array
    //     */
    //    public function __serialize()
    //    {
    //        $assoc = [];
    //        $assoc['fname'] = $this->_fname;
    //        $assoc['lname'] = $this->_lname;
    //        $assoc['email'] = $this->_email;
    //        $assoc['phone'] = $this->_phone;
    //        $assoc['state'] = $this->_state;
    //        $assoc['experience'] = $this->_experience;
    //        $assoc['bio'] = $this->_bio;
    //        $assoc['github'] = $this->_github;
    //        $assoc['relocate'] = $this->_relocate;
    //        return $assoc;
    //    }
    //
    //    /**
    //     * @param $data  Output from serialize() function
    //     * or anything that calls the unserialize method
    //     *
    //     * @return void
    //     */
    //    public function __unserialize($data)
    //    {
    //        $this->_fname = $data['fname'];
    //        $this->_lname = $data['lname'];
    //        $this->_email = $data['email'];
    //        $this->_phone = $data['phone'];
    //        $this->_state = $data['state'];
    //        $this->_experience = $data['experience'];
    //        $this->_bio = $data['bio'];
    //        $this->_github = $data['github'];
    //        $this->_relocate = $data['relocate'];
    //    }


}
