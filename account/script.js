const submitButton = document.getElementById('submit');
const container = document.getElementById('container');
const yearSelect = document.getElementById("year");
const monthSelect = document.getElementById("month");
const daySelect = document.getElementById("day");

const months = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 
'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม',
'พฤศจิกายน', 'ธันวาคม'];

(function populateMonths(){
    for(let i = 0; i < months.length; i++){
        const option = document.createElement('option');
        option.textContent = months[i];
        monthSelect.appendChild(option);
    }
    monthSelect.value = "มกราคม";
})();

let previousDay;

function populateDays(month){
    while(daySelect.firstChild){
        daySelect.removeChild(daySelect.firstChild);
    }
    let dayNum;
    let year = yearSelect.value;

    if(month === 'มกราคม' || month === 'มีนาคม' || 
    month === 'พฤษภาคม' || month === 'กรกฎาคม' || month === 'สิงหาคม' 
    || month === 'ตุลาคม' || month === 'ธันวาคม') {
        dayNum = 31;
    } else if(month === 'เมษายน' || month === 'มิถุนายน' 
    || month === 'กันยายน' || month === 'พฤศจิกายน') {
        dayNum = 30;
    }else{
        if(new Date(year, 1, 29).getMonth() === 1){
            dayNum = 29;
        }else{
            dayNum = 28;
        }
    }
    for(let i = 1; i <= dayNum; i++){
        const option = document.createElement("option");
        option.textContent = i;
        daySelect.appendChild(option);
    }
    if(previousDay){
        daySelect.value = previousDay;
        if(daySelect.value === ""){
            daySelect.value = previousDay - 1;
        }
        if(daySelect.value === ""){
            daySelect.value = previousDay - 2;
        }
        if(daySelect.value === ""){
            daySelect.value = previousDay - 3;
        }
    }
}

function populateYears(){
    let year = new Date().getFullYear();
    for(let i = 0; i < 101; i++){
        const option = document.createElement("option");
        option.textContent = year - i;
        yearSelect.appendChild(option);
    }
}

populateDays(monthSelect.value);
populateYears();

yearSelect.onchange = function() {
    populateDays(monthSelect.value);
}
monthSelect.onchange = function() {
    populateDays(monthSelect.value);
}
daySelect.onchange = function() {
    previousDay = daySelect.value;
}

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});