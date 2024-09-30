const imageDirectory = '/assets/images/home-background/'; // Path to the image directory
const delay = 7000; // Delay in milliseconds
let databaseImg = null;

function init() {
    fetch(`/controler/dir.php?path=${imageDirectory}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            databaseImg = data;
            // setTimeout(preloadImages, 1000);
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });


    // Call the function to set a random background on page load
    setTimeout(setRandomBackground, delay);
}

// function preloadImages() {
//     databaseImg = Object.values(databaseImg); // TODO: laisy charge bg image en avance
//     if (!databaseImg) return;
//     databaseImg.forEach(image => { // TODO: convertir toutes les images en webp
//         const img = new Image();
//         img.src = `${imageDirectory}${image}`;
//     });
// }

// Function to get a random image from the 'image' directory
function setRandomBackground() {
    const randomImage = databaseImg[Math.floor(Math.random() * Object.keys(databaseImg).length) + 2];
    document.body.style.backgroundImage = `url('${imageDirectory}${randomImage}')`;

    // recall the function
    setTimeout(setRandomBackground, delay);
}

// Call the init function
init();