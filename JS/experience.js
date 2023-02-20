
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
                if(window.doMailingLists == 1){
                    document.location.href ="mailingLists";
                }else{
                    document.location.href ="summary";
                }
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

    if("biography" in cookie){
        document.querySelector("#biography").value = decodeHtml(decodeURIComponent(cookie["biography"]));
    }
    if("github" in cookie){
        document.querySelector("#github").value = decodeURIComponent(cookie["github"]);
    }
    if("mailing" in cookie){
        window.doMailingLists = cookie["mailing"];
    }

}

window.onload = function(){
    stickyCookies();
};

const submitButton = document.querySelector("#submitExperience");
submitButton.addEventListener("click", ()=>{experienceSubmit()}, false);