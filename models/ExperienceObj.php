<?php
class ExperienceObj extends PostedObj {
    public function validGithub(){
        if(empty($this->decodedObj->github)){
            $this->obj->error = true;
            $this->obj->message = "Github is required.";
            echo json_encode($this->obj);
            exit;
        }
        if(!filter_var($this->decodedObj->github, FILTER_VALIDATE_URL) || !preg_match("/github.com/", $this->decodedObj->github)){
            $this->obj->error = true;
            $this->obj->message = "Github URI must be prefixed with protocol.  Please copy URI directly from address bar.";
            echo json_encode($this->obj);
            exit;
        }
    }

    public function validExperience(){
        if(empty($this->decodedObj->years)){
            $this->obj->error = true;
            $this->obj->message = "Years of experience selection is required.";
            echo json_encode($this->obj);
            exit;
        }
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