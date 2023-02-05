
const mailingListsSubmit = function (){

    // let biography = document.querySelector("#biography").value;
    // let github = document.querySelector("#github").value;
    // let years = document.forms.experience.years.value;
    // let relocate = document.forms.experience.relocate.value;
    //let years = document.querySelector('input[name="years"]:checked').value;
    //let relocate = document.querySelector('input[name="relocate"]:checked').value;

    //TODO:  do validation first

    const mailingListsObj = {
        jobsArray:[],
        verticalsArray:[]
    };

    let jobsChecked = document.querySelectorAll('input[name=jobsArray]:checked');
    mailingListsObj.jobsArray = Array.from(jobsChecked).map(x => x.id);

    let verticalsChecked = document.querySelectorAll('input[name=verticalsArray]:checked');
    mailingListsObj.verticalsArray = Array.from(verticalsChecked).map(x => x.id);

    let JSONpayload = JSON.stringify(mailingListsObj);

    var fail = true;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var fail = false;
            //document.querySelector("#submitFeedback").innerHTML = this.responseText;
            let responseObj = JSON.parse(this.responseText);
            if(responseObj.error  == true){
                document.querySelector("#submitFeedback").innerHTML = responseObj.message;
            }else{
                document.querySelector("#submitFeedback").innerHTML = responseObj.message;
                document.location.href ="summary";
            }
        }else{
            document.querySelector("#submitFeedback").innerHTML = this.responseText;
            window.setTimeout(failed(fail), 4000);
        }
    };
    xhttp.open("POST", "mailingLists", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("JSONpayload="+JSONpayload);
}

function failed(fail){
    if(fail){
        document.querySelector("#submitFeedback").innerHTML = "Failed to connect to server.";
    }
}