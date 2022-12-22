function millisToMinutesAndSeconds(millis) {
    var minutes = Math.floor(millis / 60000);
    var seconds = ((millis % 60000) / 1000).toFixed(0);
    console.log(minutes + ":" + (seconds < 10 ? '0' : '') + seconds);
}
var lateEmployeesArray = [];

function is30MinsLate()
{
    //Check Schedule
    $.ajax({
        type: "POST",
        url: "ajax/notification.php",
        data: "get=late-employees"
        // async: false
    }).done(function(result){
        lateEmployees = JSON.parse(result);
        // Checks if there are late employees
        // if(lateEmployees.length == 0){
            console.log("Empty");
            var element = document.querySelector('.notif-content');
            var currentDate = new Date().toLocaleString();
            var divElem = document.createElement('div');
            divElem.className = "notif-empty";
            divElem.innerHTML = '<p class="notif-paragpraph"> Nothing to see here.</p>';
            element.prepend(divElem);
        // }else{
        //     console.log("Late Employees");
        // }
        // console.log(lateEmployees);
        // for(let i = 0; i < Object.keys(lateEmployees).length; i++){
        //     console.log(i);
        //     if(!lateEmployeesArray.includes(lateEmployees[i][0])){
        //         console.log("Late Emp Array: " + lateEmployeesArray);
        //         lateEmployeesArray.push(lateEmployees[i][0]);
        //         var element = document.querySelector('.notif-content');
        //         var currentDate = new Date().toLocaleString();
        //         var divElem = document.createElement('div');
        //         divElem.className = "notif-details";
        //         divElem.innerHTML = '<p class="notif-date">' + currentDate + '</p><p class="notif-paragpraph">' + lateEmployees[i][0] + " is late.</p>";
        //         element.prepend(divElem);
        //     }
        // }
    }); 
    // console.log(lateEmployees);
    // Checks Every ID if already inside array

    //Compute Time difference in millis
    // var final_time = new Date("12/9/2022");
    // var c_date = new Date();
    // var diffInMillis = final_time.getTime() - c_date.getTime();
    // return(diffInMillis);
}
is30MinsLate();
// setInterval(is30MinsLate, 60000) ;
// is30MinsLate();
// millisToMinutesAndSeconds(timeDiff);