function millisToMinutesAndSeconds(millis) {
    var minutes = Math.floor(millis / 60000);
    var seconds = ((millis % 60000) / 1000).toFixed(0);
    console.log(minutes + ":" + (seconds < 10 ? '0' : '') + seconds);
}

function isLate()
{
    //Check Schedule
    var final_time = new Date(2022, 12, 7, 11, 30);
    var c_date = new Date();
    var diffInMillis = final_time.getTime() - c_date.getTime();
    console.log(final_time.getTime());
    return(diffInMillis);
    //Check Each Driver/PAO
}

let timeDiff = isLate();
millisToMinutesAndSeconds(timeDiff);