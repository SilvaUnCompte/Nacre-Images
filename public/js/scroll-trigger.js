// Get all elements with the class 'scroll-active'
const scrollActiveElements = document.querySelectorAll('.scroll-trigger');
const bulle = document.getElementById('bulle');
const gift_bubble = document.getElementById('gift-bubble');

// Function to detect scroll level and compare with 'scroll-lv' attribute
window.addEventListener('scroll', scrollTrigger);

function scrollTrigger() {
    const scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    // Flotting info button functionality
    if (scrollPosition > 20) {
        bulle.classList.add('hidden');
    }

        // Flotting bubble gift functionality
    if (scrollPosition > 800) {
        gift_bubble.classList.remove('hidden');
    }
    else {
        gift_bubble.classList.add('hidden');
    }

    scrollActiveElements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top + window.scrollY - window.innerHeight * (10 / 11);

        if (scrollPosition >= elementPosition) {
            element.classList.add('scroll-active');
        }
    });
}


// Floating info button click event to scroll to the next section
bulle.addEventListener('click', function () {
    window.scrollTo({
        top: window.innerHeight - 230,
        behavior: 'smooth'
    });
});