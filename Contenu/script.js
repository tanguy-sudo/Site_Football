function toastFunction() {
    var x = document.getElementById("myToast");
    x.setAttribute("class", "show");
    setTimeout(function(){ 
        x.className = x.className.replace("show", "");}, 
        3000
    );
}

$(document).ready(function(){
        switch($_GET_PATH()){
                case 'convocation':
                        $('#navConv').addClass('active');
                        $('#dropdownConvocation').addClass('active');          
                        break;
                case 'rencontre':
                        $('#navRenc').addClass('active');
                        $('#dropdownRencontre').addClass('active');      
                        break;
                case 'absence':
                        $('#navAbs').addClass('active');
                        $('#dropdownAbsence').addClass('active');            
                        break;
                case 'connexion':
                        $('#navCon').addClass('active');
                        break;
                case 'effectif':
                        $('#navEff').addClass('active');
                        $('#dropdownEffectif').addClass('active');
                        break;
        }

        convocationListEffectifs();


        /*
            var elementTBODY = document.querySelector('#tableAbsent > tbody');
            var row = elementTBODY.rows;
            var tabAbsent = [];
            for (var j = 0; j < row.length; j++) {
                tabAbsent.push(row[j].cells[2].innerText);
            }

            $('#PlayerList0, #PlayerList1, #PlayerList2').change(function(event) { 
                var notSelected0 = $("#PlayerList0").find('option').not(':selected').not(':disabled');
                var elementTBODY = document.querySelector('#tableAbsent > tbody');
                var row = elementTBODY.rows;
                for (var j = 0; j < row.length; j++) {
                    row[j].deleteCell(1);
                }

                var array = notSelected0.map(function () {
                    /*var elementTR = document.createElement('tr');
                    var elementTd = document.createElement('td');
                    var txt = document.createTextNode(this.textContent);
                    elementTd.appendChild(txt);
                
                    //elementTR.appendChild(elementTd);
                    
                    elementTBODY.appendChild(elementTR);
                }).get();
            });
        */


});



function ListEffectifs(){
        var txt0 = $("#PlayerList0").val();
        txt0.forEach(element => $("#PlayerList1 option[value=" + element + "]").prop("disabled", true)); 
        txt0.forEach(element => $("#PlayerList2 option[value=" + element + "]").prop("disabled", true));  
        var notSelected0 = $("#PlayerList0").find('option').not(':selected').not(':disabled');
        var array = notSelected0.map(function () {
            $("#PlayerList1 option[value=" + this.value + "]").prop("disabled", false); 
            $("#PlayerList2 option[value=" + this.value + "]").prop("disabled", false); 
        }).get();
    

        var txt1 = $("#PlayerList1").val();
        txt1.forEach(element => $("#PlayerList0 option[value=" + element + "]").prop("disabled", true)); 
        txt1.forEach(element => $("#PlayerList2 option[value=" + element + "]").prop("disabled", true));  
        var notSelected1 = $("#PlayerList1").find('option').not(':selected').not(':disabled');;
        var array = notSelected1.map(function () {
            $("#PlayerList0 option[value=" + this.value + "]").prop("disabled", false); 
            $("#PlayerList2 option[value=" + this.value + "]").prop("disabled", false); 
        }).get();

        var txt2 = $("#PlayerList2").val();
        txt2.forEach(element => $("#PlayerList0 option[value=" + element + "]").prop("disabled", true)); 
        txt2.forEach(element => $("#PlayerList1 option[value=" + element + "]").prop("disabled", true));  
        var notSelected2 = $("#PlayerList2").find('option').not(':selected').not(':disabled');;
        var array = notSelected2.map(function () {
            $("#PlayerList0 option[value=" + this.value + "]").prop("disabled", false); 
            $("#PlayerList1 option[value=" + this.value + "]").prop("disabled", false); 
        }).get();    
}

function convocationListEffectifs(){

    var last_valid_selection = null;
    $('#PlayerList0, #PlayerList1, #PlayerList2').change(function(event) {

      if ($(this).val().length > 14) {

        $(this).val(last_valid_selection);
        alert("Vous pouvez sélectionner uniquement entre 11 et 14 personnes");
      } else {
        last_valid_selection = $(this).val();
      }
    });

    $('#PlayerList0').change(function(event) {
        var txt = $("#PlayerList0").val();
        txt.forEach(element => $("#PlayerList1 option[value=" + element + "]").prop("disabled", true)); 
        txt.forEach(element => $("#PlayerList2 option[value=" + element + "]").prop("disabled", true));  
        var notSelected0 = $("#PlayerList0").find('option').not(':selected').not(':disabled');
        var array = notSelected0.map(function () {
            $("#PlayerList1 option[value=" + this.value + "]").prop("disabled", false); 
            $("#PlayerList2 option[value=" + this.value + "]").prop("disabled", false); 
        }).get();
    });

    $('#PlayerList1').change(function(event) {
        var txt = $("#PlayerList1").val();
        txt.forEach(element => $("#PlayerList0 option[value=" + element + "]").prop("disabled", true)); 
        txt.forEach(element => $("#PlayerList2 option[value=" + element + "]").prop("disabled", true));  
        var notSelected1 = $("#PlayerList1").find('option').not(':selected').not(':disabled');;
        var array = notSelected1.map(function () {
            $("#PlayerList0 option[value=" + this.value + "]").prop("disabled", false); 
            $("#PlayerList2 option[value=" + this.value + "]").prop("disabled", false); 
        }).get();
    });

    $('#PlayerList2').change(function(event) {
        var txt = $("#PlayerList2").val();
        txt.forEach(element => $("#PlayerList0 option[value=" + element + "]").prop("disabled", true)); 
        txt.forEach(element => $("#PlayerList1 option[value=" + element + "]").prop("disabled", true));  
        var notSelected2 = $("#PlayerList2").find('option').not(':selected').not(':disabled');;
        var array = notSelected2.map(function () {
            $("#PlayerList0 option[value=" + this.value + "]").prop("disabled", false); 
            $("#PlayerList1 option[value=" + this.value + "]").prop("disabled", false); 
        }).get();    
    });
}
      
      
function $_GET_PATH() {
        var path = window.location.href.split("/");
        return path[4] ? path[4] : null;
}

function deleteRencontre(){        
        if (confirm('Souhaitez-vous réellement supprimer cette rencontre, cela peut entraîner la suppression d\'une convocation ?')) {
                // oui
                return true;
                
        } else {
                // non
                return false;
        }
}

function FileIsCsv(frm){
        var ok=1;
        if (frm.elements['CsvFile'].value =="") {
                ok=0;
                alert('Vous devez fournir un fichier .csv');
                return false;
        }
        else if (frm.elements['CsvFile'].value.substr(-4)!=".csv") {
                ok=0;
                alert('Le fichier doit être fourni en format .csv');
                return false;
        }

        //si tout est ok
        if (ok==1){
                return true;
        }
        else {
                return false;
        }
}


var today = new Date();
var currentMonth = today.getMonth();
var currentYear = today.getFullYear();
var selectYear = document.getElementById("year");
var selectMonth = document.getElementById("month");

var months = [];
var selectedDates = [];
var years = [];

// parameters to be set for the datepicker to run accordingly
var minYear = 2000;
var maxYear = 2050;
var startMonth = 0;
var endMonth = 11;
var highlightToday = true;
var dateSeparator = ', ';

// constants that would be used in the script
const dictionaryMonth =
    [
        ["Jan", 0],
        ["Fev", 1],
        ["Mar", 2],
        ["Avr", 3],
        ["Mai", 4],
        ["Jun", 5],
        ["Jul", 6],
        ["Aou", 7],
        ["Sep", 8],
        ["Oct", 9],
        ["Nov", 10],
        ["Dec", 11]
    ];

//this class will add a background to the selected date
const highlightClass = 'highlight';

$(document).ready(function (e) {
    today = new Date();
    currentMonth = today.getMonth();
    currentYear = today.getFullYear();
    selectYear = document.getElementById("year");
    selectMonth = document.getElementById("month");
    loadControl(currentMonth, currentYear);
});

function next() {
    currentYear = currentMonth === 11 ? currentYear + 1 : currentYear;
    currentMonth = currentMonth + 1 % 12;
    loadControl(currentMonth, currentYear);
}

function previous() {
    currentYear = currentMonth === 0 ? currentYear - 1 : currentYear;
    currentMonth = currentMonth === 0 ? 11 : currentMonth - 1;
    loadControl(currentMonth, currentYear);
}

function change() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    loadControl(currentMonth, currentYear);
}


function loadControl(month, year) {
    
    addMonths(month);
    addYears(year);

    let firstDay = (new Date(year, month)).getDay();

     // body of the calendar
    var tbl = document.querySelector("#calendarBody");
    // clearing all previous cells
    tbl.innerHTML = "";


    var monthAndYear = document.getElementById("monthAndYear");
    // filing data about month and in the page via DOM.
    monthAndYear.innerHTML = months[month] + " " + year;


    selectYear.value = year;
    selectMonth.value = month;
    
    // creating the date cells here
    let date = 1;

    // add the selected dates here to preselect
    //selectedDates.push((month + 1).toString() + '/' + date.toString() + '/' + year.toString());

    // there will be maximum 6 rows for any month
    for (let rowIterator = 0; rowIterator < 6; rowIterator++) {

        // creates a new table row and adds it to the table body
        let row = document.createElement("tr");

        //creating individual cells, filing them up with data.
        for (let cellIterated = 0; cellIterated < 7 && date <= daysInMonth(month, year); cellIterated++) {

            // create a table data cell
            cell = document.createElement("td");
            let textNode = "";

            // check if this is the valid date for the month
            if (rowIterator !== 0 || cellIterated >= firstDay) {
                cell.id = (month + 1).toString() + '/' + date.toString() + '/' + year.toString();
                cell.class = "clickable";
                textNode = date;

                // this means that highlightToday is set to true and the date being iterated it todays date,
                // in such a scenario we will give it a background color
                if (highlightToday
                    && date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.classList.add("today-color");
                }

                // set the previous dates to be selected
                // if the selectedDates array has the dates, it means they were selected earlier. 
                // add the background to it.
                if (selectedDates.indexOf((month + 1).toString() + '/' + date.toString() + '/' + year.toString()) >= 0) {
                    cell.classList.add(highlightClass);
                }

                date++;
            }

            cellText = document.createTextNode(textNode);
            cell.appendChild(cellText);
            row.appendChild(cell);
        }

        tbl.appendChild(row); // appending each row into calendar body.
    }

    // this adds the button panel at the bottom of the calendar
    addButtonPanel(tbl);

    // function when the date cells are clicked
    $("#calendarBody tr td").click(function (e) {
        var id = $(this).attr('id');
        // check the if cell clicked has a date
        // those with an id, have the date
        if (typeof id !== typeof undefined) {
            var classes = $(this).attr('class');
            if (typeof classes === typeof undefined || !classes.includes(highlightClass)) {
                var selectedDate = new Date(id);
                selectedDates.push(selectedDate.getDate().toString() + '/' + (selectedDate.getMonth() + 1).toString() + '/' + selectedDate.getFullYear());
            }
            else {
                var index = selectedDates.indexOf(id);
                if (index > -1) {
                    selectedDates.splice(index, 1);
                }
            }

            $(this).toggleClass(highlightClass);
        }

        // sort the selected dates array based on the latest date first
        var sortedArray = selectedDates.sort((a, b) => {
            return new Date(a) - new Date(b);
        });

        // update the selectedValues text input
        document.getElementById('selectedValues').value = datesToString(sortedArray);
    });


    var $search = $('#selectedValues');
    var $dropBox = $('#parent');
    
    $search.on('blur', function (event) {
        //$dropBox.hide();
    }).on('focus', function () {
        $dropBox.show();
    });
}


// check how many days in a month code from https://dzone.com/articles/determining-number-days-month
function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}

// adds the months to the dropdown
function addMonths(selectedMonth) {
    var select = document.getElementById("month");

    if (months.length > 0) {
        return;
    }

    for (var month = startMonth; month <= endMonth; month++) {
        var monthInstance = dictionaryMonth[month];
        months.push(monthInstance[0]);
        select.options[select.options.length] = new Option(monthInstance[0], monthInstance[1], parseInt(monthInstance[1]) === parseInt(selectedMonth));
    }
}

// adds the years to the selection dropdown
// by default it is from 1990 to 2030
function addYears(selectedYear) {

    if (years.length > 0) {
        return;
    }

    var select = document.getElementById("year");

    for (var year = minYear; year <= maxYear; year++) {
        years.push(year);
        select.options[select.options.length] = new Option(year, year, parseInt(year) === parseInt(selectedYear));
    }
}

resetCalendar = function resetCalendar() {
    // reset all the selected dates
    selectedDates = [];
    $('#calendarBody tr').each(function () {
        $(this).find('td').each(function () {
            // $(this) will be the current cell
            $(this).removeClass(highlightClass);
        });
    });
};

function datesToString(dates) {
    return dates.join(dateSeparator);
}

function endSelection() {
    $('#parent').hide();
}


// to add the button panel at the bottom of the calendar
function addButtonPanel(tbl) {
    // after we have looped for all the days and the calendar is complete,
    // we will add a panel that will show the buttons, reset and done
    let row = document.createElement("tr");
    row.className = 'buttonPanel';
    cell = document.createElement("td");
    cell.colSpan = 7;
    var parentDiv = document.createElement("div");
    parentDiv.classList.add('row');
    parentDiv.classList.add('buttonPanel-row');
    

    var div = document.createElement("div");
    div.className = 'col-sm';
    var resetButton = document.createElement("button");
    resetButton.className = 'btn btn-calendar';
    resetButton.value = 'Effacer';
    resetButton.type = "reset";
    resetButton.onclick = function () { resetCalendar(); };
    var resetButtonText = document.createTextNode("Effacer");
    resetButton.appendChild(resetButtonText);

    div.appendChild(resetButton);
    parentDiv.appendChild(div);
   

    var div2 = document.createElement("div");
    div2.className = 'col-sm';
    var doneButton = document.createElement("button");
    doneButton.className = 'btn btn-calendar';
    doneButton.value = 'Valider';
    doneButton.type = "button";
    doneButton.onclick = function () { endSelection(); };
    var doneButtonText = document.createTextNode("Valider");
    doneButton.appendChild(doneButtonText);

    div2.appendChild(doneButton);
    parentDiv.appendChild(div2);

    cell.appendChild(parentDiv);
    row.appendChild(cell);
    // appending each row into calendar body.
    tbl.appendChild(row);
}
