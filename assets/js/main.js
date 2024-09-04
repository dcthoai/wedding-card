// Function to format numbers to always be two digits
function formatNumber(number) {
    return number < 10 ? '0' + number : number;
}

// Set the date we're counting down to
const countDownDate = new Date("Sep 8, 2024 10:00:00").getTime();

// Update the countdown every 1 second
let x = setInterval(function() {

    // Get today's date and time
    const now = new Date().getTime();

    // Find the distance between now and the count down date
    const distance = countDownDate - now;

    // Time calculations for days, hours, minutes, and seconds
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the respective elements with two-digit format
    document.getElementById("days").innerHTML = formatNumber(days);
    document.getElementById("hours").innerHTML = formatNumber(hours);
    document.getElementById("minutes").innerHTML = formatNumber(minutes);
    document.getElementById("seconds").innerHTML = formatNumber(seconds);

    // If the countdown is over, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("days").innerHTML = "00";
        document.getElementById("hours").innerHTML = "00";
        document.getElementById("minutes").innerHTML = "00";
        document.getElementById("seconds").innerHTML = "00";
    }
}, 1000);

const navbar = document.querySelector('header nav');
const navbarToggle = document.getElementById('header-navbar');
const navbarLinks = document.querySelectorAll('header nav .custom-navbar-link li');

// Function to check if the click was outside the navbar
function handleClickOutside(event) {
    // Check if the clicked element is not the navbar and is not a child of the navbar
    if (!navbar.contains(event.target)) {
        // Remove the 'show' class from the navbarToggle
        navbarToggle.classList.remove('show');
    }
}

// Listen for the mousedown event on the entire document
document.addEventListener('mousedown', handleClickOutside);

navbarLinks.forEach(link => {
    link.addEventListener('mousedown', () => {
        setTimeout(() => {
            navbarToggle.classList.remove('show');
        }, 300);
    });
});

const getUserInfoAutoFill = () => {
    const fullname = localStorage.getItem('card-fullname');
    const email = localStorage.getItem('card-email');
    const fullnameInputs = document.querySelectorAll('input[name="fullname"]');
    const emailInputs = document.querySelectorAll('input[name="email"]');

    if (fullname && fullname !== '')
        fullnameInputs[0].value = fullnameInputs[1].value = fullname;
    
    if (email && email !== '')
        emailInputs[0].value = emailInputs[1].value = email;
}

const setUserInfoAutoFill = (fullname, email) => {
    if (fullname && fullname !== '')
        localStorage.setItem('card-fullname', fullname);

    if (email && email !== '')
        localStorage.setItem('card-email', email);
}

window.addEventListener('DOMContentLoaded', () => {
    const textInputs = document.querySelectorAll('input[type="text"]');

    textInputs.forEach(input => {
        input.addEventListener('focus', () => {
            getUserInfoAutoFill();
        })
    })
});

window.addEventListener('beforeunload', () => {
    localStorage.removeItem('card-fullname');
    localStorage.removeItem('card-email');
});