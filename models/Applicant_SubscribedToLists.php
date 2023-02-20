<?php

namespace JobApplication;

class Applicant_SubscribedToLists extends Applicant
{
    private $_selectionsJob;
    private $_selectionsVerticals;

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


}