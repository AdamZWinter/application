google.charts.load('current', {'packages':['table']});
google.charts.setOnLoadCallback(getReportsData);
//google.charts.setOnLoadCallback(drawTable);

function drawTable(someData) {
//function drawTable() {

    var data = new google.visualization.DataTable();

    data.addColumn('string', 'First');
    data.addColumn('string', 'Last');
    data.addColumn('string', 'Email');
    data.addColumn('string', 'Phone');
    data.addColumn('string', 'State');
    data.addColumn('string', 'Github');
    data.addColumn('string', 'Experience');
    data.addColumn('string', 'Relocate');
    data.addColumn('string', 'Biography');
    data.addColumn('string', 'Photo')
    data.addColumn('string', 'Subscribed');
    data.addColumn('string', 'Subsciptions');

    data.addRows(someData);

    // data.addColumn('string', 'Name');
    // data.addColumn('number', 'Salary');
    // data.addColumn('boolean', 'Full Time Employee');
    //
    // data.addRows([
    //     ['Mike',  {v: 10000, f: '$10,000'}, true],
    //     ['Jim',   {v:8000,   f: '$8,000'},  false],
    //     ['Alice', {v: 12500, f: '$12,500'}, true],
    //     ['Bob',   {v: 7000,  f: '$7,000'},  true]
    // ]);

    var table = new google.visualization.Table(document.getElementById('table_div'));

    table.draw(data, {showRowNumber: true, width: '100%', height: '100%', page: 'enable', pageSize: 5, allowHtml: true});
}

function getReportsData(){
    var returnThis;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let responseObj = JSON.parse(this.responseText);
            if(responseObj.error  == true){
                document.querySelector("#submitFeedback").innerHTML = '<span class="text-danger">'+responseObj.message+'</span>';
                //document.querySelector("#submitFeedback").innerHTML = '<span class="text-danger">Error.</span>';
            }else{
                //document.querySelector("#submitFeedback").innerHTML = "This is actually executing.";
                drawTable(responseObj.data);
                //document.querySelector("#submitFeedback").innerHTML = "";
            }
        }else{
            document.querySelector("#submitFeedback").innerHTML = "Ready State: "+this.readyState+"  Status: "+this.status+ "  Response: "+this.responseText;
        }
    };

    xhttp.open("GET", "admin/applicants", true);
    xhttp.setRequestHeader('Accept', 'application/json');
    xhttp.send();

    return returnThis;
}