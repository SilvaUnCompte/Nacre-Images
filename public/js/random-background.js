const lazyLoader = document.getElementById('lazy-loader');
const imageDirectory = 'home-background'; // Path to the image directory
const delay = 7000; // Delay in milliseconds
let databaseImg = null;

function init() {
    fetch(`/database/api/image-dir.php?path=${imageDirectory}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            databaseImg = data;
            setTimeout(preloadImages, 2000);
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });


    // Call the function to set a random background on page load
    setTimeout(setRandomBackground, delay);
}

function preloadImages() {
    for (let i = 0; i < Object.keys(databaseImg).length; i++) {
        const img = new Image();
        img.src = `/assets/images/${imageDirectory}/${databaseImg[i + 2]}`;
        img.loading = 'lazy';
        img.alt = 'Lazy load random background ' + i;
        img.width = "1px";
        img.height = "1px";
        lazyLoader.appendChild(img);
    }
}

// Function to get a random image from the 'image' directory
function setRandomBackground() {
    const randomImage = databaseImg[Math.floor(Math.random() * Object.keys(databaseImg).length) + 2];
    document.body.style.backgroundImage = `url('/assets/images/${imageDirectory}/${randomImage}')`;

    // recall the function
    setTimeout(setRandomBackground, delay);
}

// Call the init function
init();