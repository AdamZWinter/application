<?php
class PostedObj {
    protected $decodedObj;  //The object sent from the client
    protected $obj;         //The object that will be json encoded and returned to the client.
    function __construct($JSONpayload, $obj){
        $this->decodedObj = json_decode($JSONpayload);
        $this->obj = $obj;
    }

    function getJSONencoded(){
        return json_encode($this->decodedObj);
    }

    function getObj(){
        return $this->obj;
    }
}
