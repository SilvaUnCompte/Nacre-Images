const carrouselTrack = document.querySelector('.carrousel-track');
const nextButton = document.querySelector('.carrousel-button-next');
const prevButton = document.querySelector('.carrousel-button-prev');
const imageDirectory = document.getElementById('image-directory').innerHTML; // Get the image directory from a hidden input field


document.addEventListener('DOMContentLoaded', function () {

    fetch(`/database/api/image-dir.php?path=${imageDirectory}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            createImageCard(data);
            initCarrousel();
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });

});

function createImageCard(data) {
    for (const [key, value] of Object.entries(data)) {
        carrouselTrack.innerHTML += `<div class="carrousel-slide">
                                        <img src="/assets/images/${imageDirectory}/${value}" alt="Carrousel Image ${key}" loading="lazy" class="carrousel-image">
                                    </div>`;
    }
}

function initCarrousel() {
    const slides = Array.from(document.querySelectorAll('.carrousel-slide'));
    const totalSlides = slides.length;
    let currentIndex = 1; // Start with the third slide (index 2) as active

    // Variables to track autoplay state
    let autoplayInterval = null;
    let autoplayTimeout = null;

    // Set initial position
    updateCarrousel();

    // Event listeners for buttons
    nextButton.addEventListener('click', () => {
        startAutoplay();
        if (currentIndex < totalSlides - 1) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        updateCarrousel();
    });

    prevButton.addEventListener('click', () => {
        startAutoplay();
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = totalSlides - 1;
        }
        updateCarrousel();
    });

    // Update carrousel position and active slide
    function updateCarrousel() {
        // Calculate the transform to center the active slide
        const slideWidth = 33.333; // Width of each slide in percentage
        const offset = slideWidth * (currentIndex - 1); // Offset to center the active slide
        carrouselTrack.style.transform = currentIndex == 0 ? `translateX(${slideWidth}%)` : `translateX(-${offset}%)`;

        // Update active class
        slides.forEach((slide, index) => {
            if (index === currentIndex) {
                slide.classList.add('active');
            } else {
                slide.classList.remove('active');
            }
        });
    }

    // Add touch/swipe support
    let touchStartX = 0;
    let touchEndX = 0;

    carrouselTrack.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    });

    carrouselTrack.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });

    function handleSwipe() {
        startAutoplay();
        const swipeThreshold = 50;
        if (touchEndX < touchStartX - swipeThreshold) {
            // Swipe left - go to next slide
            if (currentIndex < totalSlides - 1) {
                currentIndex++;
            } else {
                currentIndex = 0;
            }
            updateCarrousel();
        } else if (touchEndX > touchStartX + swipeThreshold) {
            // Swipe right - go to previous slide
            if (currentIndex > 0) {
                currentIndex--;
            } else {
                currentIndex = totalSlides - 1;
            }
            updateCarrousel();
        }
    }

    // Autoplay functions with proper cleanup
    function startAutoplay() {
        // Clear any existing interval first to prevent duplicates
        stopAutoplay();

        autoplayInterval = setInterval(() => {
            if (currentIndex < totalSlides - 1) {
                currentIndex++;
            } else {
                currentIndex = 0;
            }
            updateCarrousel();
        }, 4000); // Change slide every 4 seconds
    }

    function stopAutoplay() {
        if (autoplayInterval) {
            clearInterval(autoplayInterval);
            autoplayInterval = null;
        }

        // Also clear any pending timeout
        if (autoplayTimeout) {
            clearTimeout(autoplayTimeout);
            autoplayTimeout = null;
        }
    }

    // Start autoplay initially
    startAutoplay();

    // Pause autoplay on hover
    // carrouselTrack.addEventListener('mouseenter', stopAutoplay);
    // carrouselTrack.addEventListener('mouseleave', startAutoplay);
}
