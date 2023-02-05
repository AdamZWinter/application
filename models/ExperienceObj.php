<?php
class ExperienceObj extends PostedObj {
    public function validGithub(){
        if(!filter_var($this->decodedObj->github, FILTER_VALIDATE_URL) || !preg_match("/github.com/", $this->decodedObj->github)){
            $this->obj->error = true;
            $this->obj->message = "Invalid github URL.";
            echo json_encode($this->obj);
            exit;
        }
    }

    public function validExperience(){
        $possible = array("0-2", "2-4", "4");
        if(!in_array($this->decodedObj->years, $possible)){
            $this->obj->error = true;
            $this->obj->message = "Possible Spoofing: invalid option.";
            echo json_encode($this->obj);
            exit;
        }
    }

    public function sanitizeInputs(){
        $this->decodedObj->biography = filter_var($this->decodedObj->biography, FILTER_SANITIZE_STRING);
        //$this->decodedObj->years = filter_var($this->decodedObj->years, FILTER_SANITIZE_STRING);
        $this->decodedObj->relocate = filter_var($this->decodedObj->relocate, FILTER_SANITIZE_STRING);
    }

    public function notBatman(){
        if($this->decodedObj->biography == "Batman"){
            $this->obj->error = true;
            $this->obj->message = "Sorry, Batman is not going to be enough.";
            echo json_encode($this->obj);
            exit;
        }else{
            $this->obj->message = "Cool story.";
        }
    }

}