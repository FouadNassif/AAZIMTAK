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

document.addEventListener('DOMContentLoaded', function () {
    // Select all package buttons
    const selectButtons = document.querySelectorAll('.pricing-card a');

    // Add click event listener to each button
    selectButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            // Get the selected plan from the button's data attribute or href
            const selectedPlan = this.getAttribute('href').split('=')[1];

            // Update the package info section based on the selected plan
            updatePackageInfo(selectedPlan);

            // Scroll to the package info section
            document.getElementById('package-info-section').scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    function updatePackageInfo(plan) {
        // Select the elements to update
        const packageInfoTitle = document.getElementById('package-info-title');
        const packageInfoDescription = document.getElementById('package-info-description');
        const demoComponent = document.querySelector('.package-info-container .x-demo');

        if (packageInfoTitle && packageInfoDescription) {
            // Update the content based on the selected plan
            if (plan === 'basic') {
                packageInfoTitle.textContent = 'Basic Package Information';
                packageInfoDescription.innerHTML = `
            <p>Our Basic Package offers a complete set of essential features to get your wedding invitation up and running. You'll receive a stylish invitation card with your choice of music and images, delivered with a fixed design style.</p>
            <ul class="list-disc">
                <li><p class="text-lg">Choose up to 24 images for your invitation.</p></li>
                <li><p class="text-lg">We will select the perfect music to match your theme.</p></li>
                <li><p class="text-lg">Please note: The Basic Package does not include reservation options.</p></li>
            </ul>
        `;
                demoComponent?.setAttribute('rsvp', 'false');
            } else if (plan === 'premium') {
                packageInfoTitle.textContent = 'Premium Package Information';
                packageInfoDescription.innerHTML = `
            <p>The Premium Package provides more customization options, including video integration and reservation management. This package allows you to choose your own layout, ensuring your wedding invitation reflects your unique style.</p>
        `;
                demoComponent?.setAttribute('rsvp', 'true');
            } else if (plan === 'deluxe') {
                packageInfoTitle.textContent = 'Deluxe Package Information';
                packageInfoDescription.innerHTML = `
            <p>The Deluxe Package is our most comprehensive option, offering everything included in the Premium Package, plus extended access and exclusive design options. Ideal for couples looking to make a lasting impression.</p>
        `;
                demoComponent?.setAttribute('rsvp', 'true');
            }

            // Show the package info section
            const packageInfoSection = document.getElementById('package-info-section');
            if (packageInfoSection) {
                packageInfoSection.classList.remove('hidden');
            }
        }
    }
});