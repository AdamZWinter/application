
const summarySubmit = function (){

    $.post("summary/submit", {}, function (response){
        let responseObj = JSON.parse(response);
        $("#submitFeedback").html(responseObj.message);
    });
}

 const destructTimer = function(){
     window.location.href = "destroy";
 }

window.setTimeout(destructTimer, 1200000);

const submitButton = document.querySelector("#submitSummary");
submitButton.addEventListener("click", ()=>{summarySubmit()}, false);