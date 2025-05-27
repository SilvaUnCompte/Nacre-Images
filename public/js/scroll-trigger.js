// Get all elements with the class 'scroll-active'
const scrollActiveElements = document.querySelectorAll('.scroll-trigger');
const bulle = document.getElementById('bulle');

// Function to detect scroll level and compare with 'scroll-lv' attribute
window.addEventListener('scroll', scrollTrigger);

function scrollTrigger() {
    const scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    // Flotting bubble functionality
    if (scrollPosition > 20) {
        bulle.classList.add('hidden');
    }

    scrollActiveElements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top + window.scrollY - window.innerHeight * (10 / 11);

        if (scrollPosition >= elementPosition) {
            element.classList.add('scroll-active');
        }
    });
}


// Floating bubble click event to scroll to the next section
bulle.addEventListener('click', function () {
    window.scrollTo({
        top: window.innerHeight - 230,
        behavior: 'smooth'
    });
});