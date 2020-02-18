
    //Set the date we're counting down to
    var countDownDate = new Date("Feb 21, 2020 10:30:00").getTime();
    //Update the count down every 1 second
var x = setInterval(function () {
    //Get today's date and time
    var now = new Date().getTime();
    //Find the distance between now and the count down date
    var distance = countDownDate - now;
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)) + (Math.floor(distance / (1000 * 24 * 60 * 60)) * 24);
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("hours").innerHTML = hours;
    document.getElementById("minutes").innerHTML = minutes;
    document.getElementById("seconds").innerHTML = seconds;

    if (distance < 0) {
        clearInterval(x);
        var y = document.getElementById("clock");
        y.innerHTML = "<i>" + '" SORRY, WE"RE NOT ONSALES ANYMORE "' + "</i>";
        y.classList.add("timeout");
    }
});
