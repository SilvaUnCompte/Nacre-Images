// Get all elements with the class 'scroll-active'
const scrollActiveElements = document.querySelectorAll('.scroll-trigger');

// Function to detect scroll level and compare with 'scroll-lv' attribute
window.addEventListener('scroll', scrollTrigger);

function scrollTrigger() {
    const scrollPosition = window.scrollY;

    scrollActiveElements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top + window.scrollY - window.innerHeight * (10 / 11);

        if (scrollPosition >= elementPosition) {
            element.classList.add('scroll-active');
        }
    });
}