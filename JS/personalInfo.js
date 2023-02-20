
const personalInfoSubmit = function (){

    let fname = document.querySelector("#fname").value;
    let lname = document.querySelector("#lname").value;
    let email = document.querySelector("#email").value;
    let phone = document.querySelector("#phone").value;
    let state = document.querySelector("#state")[document.querySelector("#state").selectedIndex].innerHTML;
    let mailingChecked = document.querySelector("#mailing").checked;
    if(mailingChecked != 1){mailingChecked = 0;}

    //TODO:  do validation first

    let assocArray = {fname: fname, lname: lname, email: email, phone: phone, state: state, mailing: mailingChecked};
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
                document.location.href ="experience";
            }
        }else{
            document.querySelector("#submitFeedback").innerHTML = this.responseText;
            window.setTimeout(failed(fail), 4000);
        }
    };
    if(ValidateEmail(email) && ValidatePhone(phone)){
        xhttp.open("POST", "start", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("JSONpayload="+JSONpayload);
    }

}

function failed(fail){
    if(fail){
        document.querySelector("#submitFeedback").innerHTML = "Failed to connect to server.";
    }
}

function ValidateEmail(emailAddr) {
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+[\.][a-zA-Z0-9-]{2,}$/;
    //var emailAddr = document.getElementById('email').value;
    console.log(emailAddr);
    if (emailAddr.match(validRegex)) {
        return true;
    } else {
        document.querySelector("#submitFeedback").innerHTML = '<span class="text-danger">Invalid email address.</span>';
        return false;
    }
}

function ValidatePhone(phoneNum) {
    var validRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
    //var phoneNum = document.getElementById('phone').value;
    console.log(phoneNum);
    if (phoneNum.match(validRegex)) {
        return true;
    } else {
        document.querySelector("#submitFeedback").innerHTML = '<span class="text-danger">Invalid phone number.</span>';
        return false;
    }
}

function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
}

function stickyCookies() {
    let cookie = {};
    document.cookie.split(';').forEach(function(equalsPair) {
        let [k,v] = equalsPair.split('=');
        cookie[k.trim()] = v;
        console.log(k);
        console.log(v);
    })
    //return cookie[name];
    if("fname" in cookie){
        document.querySelector("#fname").value = cookie["fname"];
    }
    if("lname" in cookie){
        document.querySelector("#lname").value = cookie["lname"];
    }
    if("email" in cookie){
        document.querySelector("#email").value = decodeURIComponent(cookie["email"]);
        //document.querySelector("#email").value = "Email@email.com";
    }
    if("phone" in cookie){
        document.querySelector("#phone").value = cookie["phone"];
    }

}

window.onload = function(){
    stickyCookies();
};

const submitButton = document.querySelector("#submitPersonalInfo");
submitButton.addEventListener("click", ()=>{personalInfoSubmit()}, false);
