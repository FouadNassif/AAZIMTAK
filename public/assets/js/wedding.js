// Function to start the invitation
function start() {
    let firstInvCon = document.getElementById("inv-card-start");
    firstInvCon.style.display = "none";
    document.getElementById('main-con').style.display = "flex"; // Use flex as you are using flex classes
    document.body.style.backgroundImage = "url()";
    document.body.style.backgroundColor = "white";
    document.getElementById("demo").style.backgroundImage = "url()"
    document.getElementById("demo").style.backgroundColor = "white";
}

// Format and display the wedding date
var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
var date = new Date(window.weddingDate);
var formattedDate = date.toLocaleDateString('en-US', options);
document.getElementById('formattedDate').innerText = formattedDate;

// Set up the countdown timer
var backendDate = window.weddingDate + " " + window.ceremonyTime;
var countDownDate = new Date(backendDate).getTime();

var x = setInterval(function () {
    var now = new Date().getTime();
    var distance = countDownDate - now;

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").innerHTML = days + "<span class='text-xs font-bold'>DAYS</span>";
    document.getElementById("hours").innerHTML = hours + "<span class='text-xs font-bold'>HOURS</span>";
    document.getElementById("mins").innerHTML = minutes + "<span class='text-xs font-bold'>MINUTES</span>";
    document.getElementById("sec").innerHTML = seconds + "<span class='text-xs font-bold'>SECONDS</span>"

    if (distance < 0) {
        clearInterval(x);
        document.getElementById("days").innerHTML = "0";
        document.getElementById("hours").innerHTML = "0";
        document.getElementById("mins").innerHTML = "0";
        document.getElementById("sec").innerHTML = "0";
    }
}, 1000);

document.addEventListener('scroll', function () {
    const popup = document.getElementById('popup');
    const scrollPosition = window.scrollY + window.innerHeight;
    const documentHeight = document.documentElement.scrollHeight;

    if (scrollPosition >= documentHeight - 100) {
        popup.classList.add('show-popup');
    } else {
        popup.classList.remove('show-popup');
    }
});

