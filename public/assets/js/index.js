
// ============================== MULTI SELESTOR
$(document).ready(function () {
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
    });

});


// ========================= GOOGLE LANGUAGE TRANSLATOR
function googleTranslateElementInit() {
    new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
}











// ========================= DASHBOARD CHART 1

var options = {
    maintainAspectRatio: false,
    scales: {
        y: {
            stacked: true,
            grid: {
                display: true,
                color: "#4274da36"
            }
        },
        x: {
            grid: {
                display: false
            }
        }
    }
};
new Chart('chart', {
    type: 'bar',
    options: options,
    data: data
});


var options2 = {
    maintainAspectRatio: false,
    scales: {
        y: {
            stacked: true,
            grid: {
                display: true,
                color: "#4274da36"
            }
        },
        x: {
            grid: {
                display: false
            }
        }
    }
};
new Chart('chart2', {
    type: 'doughnut',
    options: options2,
    data: data2
});


var options3 = {
    maintainAspectRatio: false,
    scales: {
        y: {
            stacked: true,
            grid: {
                display: true,
                color: "#4274da36"
            }
        },
        x: {
            grid: {
                display: false
            }
        }
    }
};
new Chart('chart3', {
    type: 'polarArea',
    options: options3,
    data: data3
});


var options4 = {
    maintainAspectRatio: false,
    scales: {
        y: {
            stacked: true,
            grid: {
                display: true,
                color: "#4274da36"
            }
        },
        x: {
            grid: {
                display: false
            }
        }
    }
};
new Chart('chart4', {
    type: 'line',
    options: options4,
    data: data4
});









function addRevRow(tableID) {
    var table = document.getElementById(tableID);
    var row = table.insertRow(-1);
    var id = 1;
    var id1 = 1;
    var id2 = 1;

    var cell1 = row.insertCell(0);
    var element1 = document.createElement("input");
    element1.type = "text";
    element1.id = "rev-num" + id;
    id += 1;
    cell1.appendChild(element1);

    var cell2 = row.insertCell(1);
    var element2 = document.createElement("input");
    element2.type = "text";
    element2.id = "control" + id1;
    id1 += 1;
    cell2.appendChild(element2);

    var cell3 = row.insertCell(2);
    var element3 = document.createElement("input");
    element3.type = "text";
    element3.id = "change" + id2;
    id2 += 1;
    cell3.appendChild(element3);
}

function addAnnRow(tableID) {
    var table = document.getElementById(tableID);
    var row = table.insertRow(-1);
    var id = 1;
    var id1 = 1;
    var id2 = 1;

    var cell1 = row.insertCell(0);
    var element1 = document.createElement("input");
    element1.type = "text";
    element1.id = "s" + id;
    id += 1;
    cell1.appendChild(element1);

    var cell2 = row.insertCell(1);
    var element2 = document.createElement("input");
    element2.type = "text";
    element2.id = "ann" + id1;
    id1 += 1;
    cell2.appendChild(element2);

    var cell3 = row.insertCell(2);
    var element3 = document.createElement("input");
    element3.type = "text";
    element3.id = "title" + id2;
    id2 += 1;
    cell3.appendChild(element3);
}

function addTrainRow(tableID) {
    var table = document.getElementById(tableID);
    var row = table.insertRow(-1);

    var cell1 = row.insertCell(0);
    var element1 = document.createElement("input");
    element1.type = "text";
    cell1.appendChild(element1);

    var cell2 = row.insertCell(1);
    var element2 = document.createElement("input");
    element2.type = "text";
    cell2.appendChild(element2);

    var cell3 = row.insertCell(2);
    var element3 = document.createElement("input");
    element3.type = "text";
    cell3.appendChild(element3);

    var cell4 = row.insertCell(3);
    var element4 = document.createElement("input");
    element4.type = "text";
    cell4.appendChild(element4);

    var cell5 = row.insertCell(4);
    var element5 = document.createElement("input");
    element5.type = "text";
    cell5.appendChild(element5);
}


// ================================= ADD DOCUMENT DETAILS ROW
function addDocDetail(tableId) {
    var table = document.getElementById(tableId);
    var currentRowCount = table.rows.length;

    // Create a new row and set its attributes
    var newRow = table.insertRow(currentRowCount);
    newRow.setAttribute("id", "row" + currentRowCount);

    // Add cells to the row and set their attributes
    var cell1 = newRow.insertCell(0);
    cell1.innerHTML = currentRowCount;

    var cell2 = newRow.insertCell(1);
    cell2.innerHTML = "<input type='text' name='' id='cur-doc-" + currentRowCount + "'>";

    var cell3 = newRow.insertCell(2);
    cell3.innerHTML = "<input type='text' id='cur-ver-" + currentRowCount + "'>";

    var cell4 = newRow.insertCell(3);
    cell4.innerHTML = "<input type='text' id='new-doc-" + currentRowCount + "'>";

    var cell5 = newRow.insertCell(4);
    cell5.innerHTML = "<input type='text' id='new-ver-" + currentRowCount + "'>";

    // Update the sr no. in the first cell of all rows
    for (var i = 1; i < currentRowCount; i++) {
        var row = table.rows[i];
        row.cells[0].innerHTML = i;
    }
}

function addIndividualRisk(tableId) {
    var table = document.getElementById(tableId);
    var currentRowCount = table.rows.length;
    var newRow = table.insertRow(currentRowCount);
    newRow.setAttribute("id", "row" + currentRowCount);
    var cell1 = newRow.insertCell(0);
    cell1.innerHTML = currentRowCount;

    var cell2 = newRow.insertCell(1);
    cell2.innerHTML = "<input type='text' id='cur-doc-" + currentRowCount + "'>";

    var cell3 = newRow.insertCell(2);
    cell3.innerHTML = "<input type='text' id='cur-ver-" + currentRowCount + "'>";

    var cell4 = newRow.insertCell(3);
    cell4.innerHTML = "<input type='text' id='new-doc-" + currentRowCount + "'>";

    var cell5 = newRow.insertCell(4);
    cell5.innerHTML = "<input type='text' id='new-ver-" + currentRowCount + "'>";

    var cell6 = newRow.insertCell(5);
    cell6.innerHTML = "<input type='text' id='cur-doc-" + currentRowCount + "'>";

    var cell7 = newRow.insertCell(6);
    cell7.innerHTML = "<input type='text' id='cur-ver-" + currentRowCount + "'>";

    var cell8 = newRow.insertCell(7);
    cell8.innerHTML = "<input type='text' id='new-doc-" + currentRowCount + "'>";

    var cell9 = newRow.insertCell(8);
    cell9.innerHTML = "<input type='text' id='new-ver-" + currentRowCount + "'>";
    for (var i = 1; i < currentRowCount; i++) {
        var row = table.rows[i];
        row.cells[0].innerHTML = i;
    }
}




function addAffectedDocuments(tableId) {
    var table = document.getElementById(tableId);
    var currentRowCount = table.rows.length;
    var newRow = table.insertRow(currentRowCount);
    newRow.setAttribute("id", "row" + currentRowCount);
    var cell1 = newRow.insertCell(0);
    cell1.innerHTML = currentRowCount;

    var cell2 = newRow.insertCell(1);
    cell2.innerHTML = "<input type='text' id='cur-doc-" + currentRowCount + "'>";

    var cell3 = newRow.insertCell(2);
    cell3.innerHTML = "<input type='text' id='cur-ver-" + currentRowCount + "'>";

    var cell4 = newRow.insertCell(3);
    cell4.innerHTML = "<input type='text' id='new-doc-" + currentRowCount + "'>";

    var cell5 = newRow.insertCell(4);
    cell5.innerHTML = "<input type='text' id='new-ver-" + currentRowCount + "'>";

    var cell6 = newRow.insertCell(5);
    cell6.innerHTML = "<input type='text' id='cur-doc-" + currentRowCount + "'>";

    var cell7 = newRow.insertCell(6);
    cell7.innerHTML = "<input type='text' id='cur-ver-" + currentRowCount + "'>";

    var cell8 = newRow.insertCell(7);
    cell8.innerHTML = "<input type='text' id='new-doc-" + currentRowCount + "'>";
    for (var i = 1; i < currentRowCount; i++) {
        var row = table.rows[i];
        row.cells[0].innerHTML = i;
    }
}


// ================================ EIGHT INPUTS
function add8Input(tableId) {
    var table = document.getElementById(tableId);
    var currentRowCount = table.rows.length;
    var newRow = table.insertRow(currentRowCount);
    newRow.setAttribute("id", "row" + currentRowCount);
    var cell1 = newRow.insertCell(0);
    cell1.innerHTML = currentRowCount;

    var cell2 = newRow.insertCell(1);
    cell2.innerHTML = "<input type='text'>";

    var cell3 = newRow.insertCell(2);
    cell3.innerHTML = "<input type='text'>";

    var cell4 = newRow.insertCell(3);
    cell4.innerHTML = "<input type='text'>";

    var cell5 = newRow.insertCell(4);
    cell5.innerHTML = "<input type='text'>";

    var cell6 = newRow.insertCell(5);
    cell6.innerHTML = "<input type='text'>";

    var cell7 = newRow.insertCell(6);
    cell7.innerHTML = "<input type='text'>";

    var cell8 = newRow.insertCell(7);
    cell8.innerHTML = "<input type='text'>";

    var cell9 = newRow.insertCell(8);
    cell9.innerHTML = "<input type='text'>";
    for (var i = 1; i < currentRowCount; i++) {
        var row = table.rows[i];
        row.cells[0].innerHTML = i;
    }
}


// ================================ SEVEN INPUTS
function add7Input(tableId) {
    var table = document.getElementById(tableId);
    var currentRowCount = table.rows.length;
    var newRow = table.insertRow(currentRowCount);
    newRow.setAttribute("id", "row" + currentRowCount);
    var cell1 = newRow.insertCell(0);
    cell1.innerHTML = currentRowCount;

    var cell2 = newRow.insertCell(1);
    cell2.innerHTML = "<input type='text'>";

    var cell3 = newRow.insertCell(2);
    cell3.innerHTML = "<input type='text'>";

    var cell4 = newRow.insertCell(3);
    cell4.innerHTML = "<input type='text'>";

    var cell5 = newRow.insertCell(4);
    cell5.innerHTML = "<input type='text'>";

    var cell6 = newRow.insertCell(5);
    cell6.innerHTML = "<input type='text'>";

    var cell7 = newRow.insertCell(6);
    cell7.innerHTML = "<input type='text'>";

    var cell8 = newRow.insertCell(7);
    cell8.innerHTML = "<input type='text'>";
    for (var i = 1; i < currentRowCount; i++) {
        var row = table.rows[i];
        row.cells[0].innerHTML = i;
    }
}


// ================================ SIX INPUTS
function add6Input(tableId) {
    var table = document.getElementById(tableId);
    var currentRowCount = table.rows.length;
    var newRow = table.insertRow(currentRowCount);
    newRow.setAttribute("id", "row" + currentRowCount);
    var cell1 = newRow.insertCell(0);
    cell1.innerHTML = currentRowCount;

    var cell2 = newRow.insertCell(1);
    cell2.innerHTML = "<input type='text'>";

    var cell3 = newRow.insertCell(2);
    cell3.innerHTML = "<input type='text'>";

    var cell4 = newRow.insertCell(3);
    cell4.innerHTML = "<input type='text'>";

    var cell5 = newRow.insertCell(4);
    cell5.innerHTML = "<input type='text'>";

    var cell6 = newRow.insertCell(5);
    cell6.innerHTML = "<input type='text'>";

    var cell7 = newRow.insertCell(6);
    cell7.innerHTML = "<input type='text'>";
    for (var i = 1; i < currentRowCount; i++) {
        var row = table.rows[i];
        row.cells[0].innerHTML = i;
    }
}


// ================================ FIVE INPUTS
function add5Input(tableId) {
    var table = document.getElementById(tableId);
    var currentRowCount = table.rows.length;
    var newRow = table.insertRow(currentRowCount);
    newRow.setAttribute("id", "row" + currentRowCount);
    var cell1 = newRow.insertCell(0);
    cell1.innerHTML = currentRowCount;

    var cell2 = newRow.insertCell(1);
    cell2.innerHTML = "<input type='text'>";

    var cell3 = newRow.insertCell(2);
    cell3.innerHTML = "<input type='text'>";

    var cell4 = newRow.insertCell(3);
    cell4.innerHTML = "<input type='text'>";

    var cell5 = newRow.insertCell(4);
    cell5.innerHTML = "<input type='text'>";

    var cell6 = newRow.insertCell(5);
    cell6.innerHTML = "<input type='text'>";
    for (var i = 1; i < currentRowCount; i++) {
        var row = table.rows[i];
        row.cells[0].innerHTML = i;
    }
}


// ================================ FOUR INPUTS
function add4Input(tableId) {
    var table = document.getElementById(tableId);
    var currentRowCount = table.rows.length;
    var newRow = table.insertRow(currentRowCount);
    newRow.setAttribute("id", "row" + currentRowCount);
    var cell1 = newRow.insertCell(0);
    cell1.innerHTML = currentRowCount;

    var cell2 = newRow.insertCell(1);
    cell2.innerHTML = "<input type='text'>";

    var cell3 = newRow.insertCell(2);
    cell3.innerHTML = "<input type='text'>";

    var cell4 = newRow.insertCell(3);
    cell4.innerHTML = "<input type='text'>";

    var cell5 = newRow.insertCell(4);
    cell5.innerHTML = "<input type='text'>";
    for (var i = 1; i < currentRowCount; i++) {
        var row = table.rows[i];
        row.cells[0].innerHTML = i;
    }
}


// ================================ THREE INPUTS
function add3Input(tableId) {
    var table = document.getElementById(tableId);
    var currentRowCount = table.rows.length;
    var newRow = table.insertRow(currentRowCount);
    newRow.setAttribute("id", "row" + currentRowCount);
    var cell1 = newRow.insertCell(0);
    cell1.innerHTML = currentRowCount;

    var cell2 = newRow.insertCell(1);
    cell2.innerHTML = "<input type='text'>";

    var cell3 = newRow.insertCell(2);
    cell3.innerHTML = "<input type='text'>";

    var cell4 = newRow.insertCell(3);
    cell4.innerHTML = "<input type='text'>";
    for (var i = 1; i < currentRowCount; i++) {
        var row = table.rows[i];
        row.cells[0].innerHTML = i;
    }
}


// ================================ TWO INPUTS
function add2Input(tableId) {
    var table = document.getElementById(tableId);
    var currentRowCount = table.rows.length;
    var newRow = table.insertRow(currentRowCount);
    newRow.setAttribute("id", "row" + currentRowCount);
    var cell1 = newRow.insertCell(0);
    cell1.innerHTML = currentRowCount;

    var cell2 = newRow.insertCell(1);
    cell2.innerHTML = "<input type='text'>";

    var cell3 = newRow.insertCell(2);
    cell3.innerHTML = "<input type='text'>";
    for (var i = 1; i < currentRowCount; i++) {
        var row = table.rows[i];
        row.cells[0].innerHTML = i;
    }
}





// ================================ PR TABS
// function openData(evt, dataname) {
//     var i, tabcontent, tablinks;
//     tabcontent = document.getElementsByClassName("tabcontent");
//     for (i = 0; i < tabcontent.length; i++) {
//         tabcontent[i].style.display = "none";
//     }
//     tablinks = document.getElementsByClassName("tablinks");
//     for (i = 0; i < tablinks.length; i++) {
//         tablinks[i].className = tablinks[i].className.replace(" active", "");
//     }
//     document.getElementById(dataname).style.display = "block";
//     evt.currentTarget.className += " active";
// }
// document.getElementById("defaultOpen").click();



function openDivision(evt, cityName) {
    var i, divisioncontent, divisionlinks;

    divisioncontent = document.getElementsByClassName("divisioncontent");
    for (i = 0; i < divisioncontent.length; i++) {
        divisioncontent[i].style.display = "none";
    }

    divisionlinks = document.getElementsByClassName("divisionlinks");
    for (i = 0; i < divisionlinks.length; i++) {
        divisionlinks[i].className = divisionlinks[i].className.replace(" active", "");
    }

    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}




