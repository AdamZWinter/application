
const personalInfoSubmit = function (){

    let fname = document.querySelector("#fname").value;
    let lname = document.querySelector("#lname").value;
    let email = document.querySelector("#email").value;
    let phone = document.querySelector("#phone").value;
    let state = document.querySelector("#state")[document.querySelector("#state").selectedIndex].innerHTML;

    //TODO:  do validation first

    let assocArray = {fname: fname, lname: lname, email: email, phone: phone, state: state};
    let JSONpayload = JSON.stringify(assocArray);

    var fail = true;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var fail = false;
            let responseObj = JSON.parse(this.responseText);
            if(responseObj.error  == true){
                document.querySelector("#submitFeedback").innerHTML = responseObj.message;
            }else{
                document.querySelector("#submitFeedback").innerHTML = "Your name is not Batman.";
            }


        }else{
            window.setTimeout(failed(fail, result), 4000);
        }
    };
    xhttp.open("POST", "start", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("JSONpayload="+JSONpayload);
}

function failed(fail, result){
    if(fail){
        document.querySelector("#submitFeedback").innerHTML = "Failed to connect to server.";
    }
}