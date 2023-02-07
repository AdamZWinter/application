
const summarySubmit = function (){

    //TODO:  do validation first
    return document.querySelector("#submitFeedback").innerHTML = "This button doesn't do anything, yet.";

//     var fail = true;
//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             var fail = false;
//             let responseObj = JSON.parse(this.responseText);
//             if(responseObj.error  == true){
//                 document.querySelector("#submitFeedback").innerHTML = responseObj.message;
//             }else{
//                 document.querySelector("#submitFeedback").innerHTML = responseObj.message;
//                 document.location.href ="mailingLists";
//             }
//
//
//         }else{
//             document.querySelector("#submitFeedback").innerHTML = this.responseText;
//             window.setTimeout(failed(fail), 4000);
//         }
//     };
//     xhttp.open("POST", "experience", true);
//     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhttp.send("JSONpayload="+JSONpayload);
// }
//
// function failed(fail){
//     if(fail){
//         document.querySelector("#submitFeedback").innerHTML = "Failed to connect to server.";
//     }

 }

const submitButton = document.querySelector("#submitSummary");
submitButton.addEventListener("click", ()=>{summarySubmit()}, false);