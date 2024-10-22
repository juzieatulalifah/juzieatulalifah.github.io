// var countDownDate = new Date("Nov 14, 2025 00:00:00").getTime();
// var x = setInterval(function(){
//     var now = new Date().getTime();
//     var distance = countDownDate - now;

//     var days = Math.floor(distance/(1000 * 60 * 60 *24));
//     var hours = Math.floor((distance%(1000 * 60 * 60 *24))/(1000*60*60));
//     var minutes = Math.floor((distance%(1000*60*60))/(1000*60));
//     var seconds = Math.floor((distance%(1000*60))/1000);

//     document.getElementById("days").innerHTML = days;
//     document.getElementById("hours").innerHTML = hours;
//     document.getElementById("seconds").innerHTML = seconds;
//     document.getElementById("seconds").innerHTML = seconds;
// },1000);

var now = new Date();
var countDownDate = new Date(now.getTime() + (418 * 24 * 60 * 60 * 1000)); 

var x = setInterval(function(){
    var now = new Date().getTime();
    var distance = countDownDate - now; 

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = hours;
    document.getElementById("minutes").innerHTML = minutes;
    document.getElementById("seconds").innerHTML = seconds;

    if (distance < 0) {
        clearInterval(x);
        document.getElementById("days").innerHTML = "00";
        document.getElementById("hours").innerHTML = "00";
        document.getElementById("minutes").innerHTML = "00";
        document.getElementById("seconds").innerHTML = "00";
        alert("Countdown selesai!");
    }
}, 1000);


document.getElementById("buttonn").addEventListener("click", function() {
    window.location.href = "https://www.spacex.com/launches/";
});

const toggleButton = document.getElementById('dark-mode-toggle');

toggleButton.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
});

const navList = document.querySelector('.nav-list');
document.querySelector('#hamburger').onclick = () => {
    navList.classList.toggle('active');
};

