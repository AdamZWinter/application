google.charts.load('current', {'packages':['table']});
//google.charts.setOnLoadCallback(getReportsData);
google.charts.setOnLoadCallback(drawTable);

//function drawTable(someData) {
function drawTable() {

    var data = new google.visualization.DataTable();

    // data.addColumn('string', 'Date');
    // data.addColumn('string', 'Server');
    // data.addColumn('string', 'Header From');
    // data.addColumn('string', 'SPF Result');
    // data.addColumn('string', 'SPF Domain');
    // data.addColumn('string', 'DKIM Result');
    // data.addColumn('string', 'DKIM Domain');
    // data.addColumn('string', 'Selector');
    // data.addColumn('string', 'DKIM Align');
    // data.addColumn('string', 'SPF Align')
    // data.addColumn('string', 'Source IP');
    //data.addColumn('number', 'Unix Time');

    //data.addRows(someData);

    data.addColumn('string', 'Name');
    data.addColumn('number', 'Salary');
    data.addColumn('boolean', 'Full Time Employee');

    data.addRows([
        ['Mike',  {v: 10000, f: '$10,000'}, true],
        ['Jim',   {v:8000,   f: '$8,000'},  false],
        ['Alice', {v: 12500, f: '$12,500'}, true],
        ['Bob',   {v: 7000,  f: '$7,000'},  true]
    ]);

    var table = new google.visualization.Table(document.getElementById('table_div'));

    table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
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
                drawTable(responseObj.reportsData);
                document.querySelector("#submitFeedback").innerHTML = "";
            }
        }else{
            document.querySelector("#submitFeedback").innerHTML = "Ready State: "+this.readyState+"  Status: "+this.status+ "  Response: "+this.responseText;
        }
    };

    xhttp.open("GET", "api/reports.php", true);
    xhttp.setRequestHeader('Accept', 'application/json');
    xhttp.send();

    return returnThis;
}