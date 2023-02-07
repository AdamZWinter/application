
const experienceSubmit = function (){

    let biography = document.querySelector("#biography").value;
    let github = document.querySelector("#github").value;
    let years = document.forms.experience.years.value;
    //document.querySelector("#testValues").innerHTML = years;
    let relocate = document.forms.experience.relocate.value;
    //let years = document.querySelector('input[name="years"]:checked').value;
    //let relocate = document.querySelector('input[name="relocate"]:checked').value;

    //TODO:  do validation first

    let assocArray = {biography: biography, github: github, years: years, relocate: relocate};
    let JSONpayload = JSON.stringify(assocArray);

    var fail = true;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var fail = false;
            let responseObj = JSON.parse(this.responseText);
            if(responseObj.error  == true){
                document.querySelector("#submitFeedback").innerHTML = '<span class="text-danger">'+responseObj.message+'</span>';
            }else{
                document.querySelector("#submitFeedback").innerHTML = responseObj.message;
                document.location.href ="mailingLists";
            }


        }else{
            document.querySelector("#submitFeedback").innerHTML = this.responseText;
            window.setTimeout(failed(fail), 4000);
        }
    };
    xhttp.open("POST", "experience", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("JSONpayload="+JSONpayload);
}

function failed(fail){
    if(fail){
        document.querySelector("#submitFeedback").innerHTML = "Failed to connect to server.";
    }
}

const submitButton = document.querySelector("#submitExperience");
submitButton.addEventListener("click", ()=>{experienceSubmit()}, false);