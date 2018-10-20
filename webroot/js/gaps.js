var rows = [0];

$(document).ready(
    function () {
        $('#date0').bootstrapMaterialDatePicker({
            time: false,
            clearButton: true,
            minDate: new Date()
        });

        $('#startTime0').bootstrapMaterialDatePicker({
            date: false,
            shortTime: false,
            format: 'HH:mm'
        });

        $('#endTime0').bootstrapMaterialDatePicker({
            date: false,
            shortTime: false,
            format: 'HH:mm'
        });
    }
);

function datePicker(id) {
    $('#date' + id).bootstrapMaterialDatePicker({
        time: false,
        clearButton: true,
        minDate: new Date()
    });

    $('#startTime' + id).bootstrapMaterialDatePicker({
        date: false,
        shortTime: false,
        format: 'HH:mm'
    });

    $('#endTime' + id).bootstrapMaterialDatePicker({
        date: false,
        shortTime: false,
        format: 'HH:mm'
    });
}

var rowNum = 1;
function addRow() {
    rows.push(rowNum);
    console.log(rows);
    var x = document.getElementById('gapsTable').insertRow(rows.length);

    var c1 = x.insertCell(0);
    var c2 = x.insertCell(1);
    var c3 = x.insertCell(2);
    var c4 = x.insertCell(3);

    c1.innerHTML = "<input class='form-control floating-label text-center date' id='date" + rowNum + "' placeholder='Fecha' type='text' onChange='loadDate(" + rowNum + ")'>";
    c2.innerHTML = "<input class='form-control floating-label text-center startTime' id='startTime" + rowNum + "' placeholder='Hora inicio' type='text' onChange='loadStartTime(" + rowNum + ")'>";
    c3.innerHTML = "<input class='form-control floating-label text-center endTime' id='endTime" + rowNum + "' placeholder='Hora fin' type='text' onChange='loadEndTime(" + rowNum + ")'>";
    c4.innerHTML = "<td><button class='btn btn-outline-danger btn-sm' onClick='deleteRow(" + rowNum + ")' type='button'><i class='material-icons'>delete</i></button></td>"

    datePicker(rowNum);
    rowNum++;
}

function deleteRow(id) {
    var index = rows.indexOf(id);

    console.log("index " + index);

    if (index > -1) {
        rows.splice(index, 1);
    }

    document.getElementById('gapsTable').deleteRow(index + 1);
}

var div = document.getElementById("inputs");

function loadDate(rowNum, poll_id) {
    rows.push(rowNum);

    var userId = document.createElement("input");
    userId.name = rowNum + "[poll_id]";
    userId.value = poll_id;
    userId.style.visibility = "hidden";
    div.appendChild(userId);

    var date = document.getElementById("date" + rowNum).value;

    var startYear = document.createElement("input");
    var endYear = document.createElement("input");

    startYear.name = rowNum + "[start_date][year]";
    startYear.value = date.split("-")[0];

    endYear.name = rowNum + "[end_date][year]";
    endYear.value = date.split("-")[0];

    endYear.style.visibility = "hidden";
    startYear.style.visibility = "hidden";

    div.appendChild(startYear);
    div.appendChild(endYear);

    var startMonth = document.createElement("input");
    var endMonth = document.createElement("input");

    startMonth.name = rowNum + "[start_date][month]";
    startMonth.value = date.split("-")[1];

    endMonth.name = rowNum + "[end_date][month]";
    endMonth.value = date.split("-")[1];

    endMonth.style.visibility = "hidden";
    startMonth.style.visibility = "hidden";

    div.appendChild(startMonth);
    div.appendChild(endMonth);

    var startDay = document.createElement("input");
    var endDay = document.createElement("input");

    startDay.name = rowNum + "[start_date][day]";
    startDay.value = date.split("-")[2];

    endDay.name = rowNum + "[end_date][day]";
    endDay.value = date.split("-")[2];

    endDay.style.visibility = "hidden";
    startDay.style.visibility = "hidden";

    div.appendChild(startDay);
    div.appendChild(endDay);
}

function loadStartTime(rowNum) {
    var startTime = document.getElementById("startTime" + rowNum).value;

    var startHour = document.createElement("input");
    var startMinute = document.createElement("input");

    startHour.name = rowNum + "[start_date][hour]";
    startHour.value = startTime.split(":")[0];

    startMinute.name = rowNum + "[start_date][minute]";
    startMinute.value = startTime.split(":")[1];

    startMinute.style.visibility = "hidden";
    startHour.style.visibility = "hidden";

    div.appendChild(startHour);
    div.appendChild(startMinute);
}

function loadEndTime(rowNum) {
    var endTime = document.getElementById("endTime" + rowNum).value;

    var endHour = document.createElement("input");
    var endMinute = document.createElement("input");

    endHour.name = rowNum + "[end_date][hour]";
    endHour.value = endTime.split(":")[0];

    endMinute.name = rowNum + "[end_date][minute]";
    endMinute.value = endTime.split(":")[1];

    endMinute.style.visibility = "hidden";
    endHour.style.visibility = "hidden";

    div.appendChild(endHour);
    div.appendChild(endMinute);
}