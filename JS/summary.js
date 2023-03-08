
const summarySubmit = function (){

    $.post("summary/submit", {}, function (response){
        //$("#submitFeedback").html(response);
        try {
            let responseObj = JSON.parse(response);
            if (responseObj.error == true) {
                document.querySelector("#submitFeedback").innerHTML = responseObj.message;
            } else {
                console.log(responseObj.message);
                document.querySelector("#submitFeedback").innerHTML = responseObj.message;
                document.querySelector("#submitSummary").classList.add("d-none");
                document.querySelector("#buttonDone").classList.remove("d-none");
                document.querySelector("#photoForm").classList.add("d-none");
            }
        } catch (e) {
            $("#submitFeedback").html(response);
        }
    });
}

 const destructTimer = function(){
     window.location.href = "destroy";
 }

window.setTimeout(destructTimer, 1200000);

const submitButton = document.querySelector("#submitSummary");
submitButton.addEventListener("click", ()=>{summarySubmit()}, false);

// const buttonDone = document.querySelector("#buttonDone");
// buttonDone.addEventListener("click", window.location("home"), false);