function millisToMinutesAndSeconds(millis) {
    var minutes = Math.floor(millis / 60000);
    var seconds = ((millis % 60000) / 1000).toFixed(0);
    console.log(minutes + ":" + (seconds < 10 ? '0' : '') + seconds);
}

function is30MinsLate()
{
    //Check Schedule
    let revenueData = $.parseJSON($.ajax({
        type: "POST",
        url: "ajax/notification.php",
        data: "get=late-employees",
        async: false
    }).responseText);
    console.log(revenueData);
    //Compute Time difference in millis
    var final_time = new Date("12/9/2022");
    var c_date = new Date();
    var diffInMillis = final_time.getTime() - c_date.getTime();
    return(diffInMillis);
}
is30MinsLate();
setInterval(is30MinsLate, 60000) ;
// millisToMinutesAndSeconds(timeDiff);