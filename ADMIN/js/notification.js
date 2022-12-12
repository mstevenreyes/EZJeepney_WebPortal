function millisToMinutesAndSeconds(millis) {
    var minutes = Math.floor(millis / 60000);
    var seconds = ((millis % 60000) / 1000).toFixed(0);
    console.log(minutes + ":" + (seconds < 10 ? '0' : '') + seconds);
}
var lateEmployeesArray = [];

function is30MinsLate()
{
    //Check Schedule
    var lateEmployees = $.parseJSON($.ajax({
        type: "POST",
        url: "ajax/notification.php",
        data: "get=late-employees",
        async: false
    }).responseText); 
    // console.log(lateEmployees[0][0] + ' is late.');
    // Checks Every ID if already inside array
    for(let i = 0; i < Object.keys(lateEmployees).length; i++){
        console.log(i);
        if(!lateEmployeesArray.includes(lateEmployees[i][0])){
            console.log("Late Emp Array: " + lateEmployeesArray);
            lateEmployeesArray.push(lateEmployees[i][0]);
            // notif content area
            var element = document.querySelector('.notif-content');
            var currentDate = new Date().toLocaleString();
            var divElem = document.createElement('div');
            divElem.className = "notif-details";
            divElem.innerHTML = '<p class="notif-date">' + currentDate + '</p><p class="notif-paragpraph">' + lateEmployees[i][0] + " is late.</p>";
            element.prepend(divElem);
        }
    }
    //Compute Time difference in millis
    // var final_time = new Date("12/9/2022");
    // var c_date = new Date();
    // var diffInMillis = final_time.getTime() - c_date.getTime();
    // return(diffInMillis);
}
is30MinsLate();
setInterval(is30MinsLate, 10000) ;
// is30MinsLate();
// millisToMinutesAndSeconds(timeDiff);