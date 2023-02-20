<?php

namespace JobApplication;

class Applicant
{
    private $_fname;
    private $_lname;
    private $_email;
    private $_phone;
    private $_state;
    private $_github;
    private $_experience;
    private $_relocate;
    private $_bio;

    /**
     * @param $_fname  Applicant first name
     * @param $_lname  Applicant last name
     * @param $_email  Applicant email
     * @param $_phone  Applicant phone
     * @param $_state  Applicant state
     */
    public function __construct($fname, $lname, $email, $phone, $state)
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_email = $email;
        $this->_phone = $phone;
        $this->_state = $state;
    }

}