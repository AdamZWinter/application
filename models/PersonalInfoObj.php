     <?php
     class PersonalInfoObj extends PostedObj {
//    protected $decodedObj;  //The object sent from the client
//    protected $obj;         //The object that will be json encoded and returned to the client.
//    function __construct($JSONpayload, $obj){
//        $this->decodedObj = json_decode($JSONpayload);
//        $this->obj = $obj;
//    }
         public function validName(){
             if(empty($this->decodedObj->fname) || empty($this->decodedObj->lname)){
                 $this->obj->error = true;
                 $this->obj->message = "First and Last names are required";
                 echo json_encode($this->obj);
                 exit;
             }
             if(!ctype_alpha($this->decodedObj->fname) || !ctype_alpha($this->decodedObj->lname)){
                 $this->obj->error = true;
                 $this->obj->message = "Names can only contain letters";
                 echo json_encode($this->obj);
                 exit;
             }
         }//end function validName

         public function validEmail(){
             if(empty($this->decodedObj->email)){
                 $this->obj->error = true;
                 $this->obj->message = "Email address is required.";
                 echo json_encode($this->obj);
                 exit;
             }
             if(!filter_var($this->decodedObj->email, FILTER_VALIDATE_EMAIL)){
                 $this->obj->error = true;
                 $this->obj->message = "Invalid email address.";
                 echo json_encode($this->obj);
                 exit;
             }
         }

         public function validPhone(){
             if(empty($this->decodedObj->phone)){
                 $this->obj->error = true;
                 $this->obj->message = "Phone number is required.";
                 echo json_encode($this->obj);
                 exit;
             }
             $this->decodedObj->phone = filter_var($this->decodedObj->phone, FILTER_SANITIZE_STRING);
             if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $this->decodedObj->phone)){
                 $this->obj->error = true;
                 $this->obj->message = "Phone number must be in ###-###-#### format.";
                 echo json_encode($this->obj);
                 exit;
             }
         }

         public function validState(){
             require_once('constants/states.php');
             if(!in_array($this->decodedObj->state, $STATES)){
                 $this->obj->error = true;
                 $this->obj->message = 'Possible Spoofing: Submission includes a state value that is not acceptable';
                 echo json_encode($this->obj);
                 exit;
             }
         }

         public function notBatman(){
             if($this->decodedObj->fname == "Batman"){
                 $this->obj->error = true;
                 $this->obj->message = "Sorry, you cannot be Batman.";
                 echo json_encode($this->obj);
                 exit;
             }else{
                 $this->obj->message = "Cool name.";
             }
         }
     }