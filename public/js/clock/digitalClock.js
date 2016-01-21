function startTime(date) 
{
    var h = date.getHours();
    var m = date.getMinutes();
    var s = date.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    $('#clock_digital').html(h + ":" + m + ":" + s);
    setTimeout(function() {
        date.setSeconds(date.getSeconds() + 1);
        startTime(date);
    }, 1000);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}