// Get all elements with the class 'scroll-active'
const scrollActiveElements = document.querySelectorAll('.scroll-trigger');

// Convert NodeList to Array (optional, if you need array methods)
const scrollActiveArray = Array.from(scrollActiveElements);

// Function to detect scroll level and compare with 'scroll-lv' attribute
window.addEventListener('scroll', () => {
    const scrollPosition = window.scrollY;

    scrollActiveArray.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top + window.scrollY - window.innerHeight * (10 / 11);

        if (scrollPosition >= elementPosition) {
            element.classList.add('scroll-active');
        } 
    });
});