const imageDirectory = '/assets/images/home-background/'; // Path to the image directory
const delay = 7000; // Delay in milliseconds


// Function to get a random image from the 'image' directory
function setRandomBackground() {
    fetch(`/controler/dir.php?path=${imageDirectory}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const randomImage = data[Math.floor(Math.random() * Object.keys(data).length) + 2];
            document.body.style.backgroundImage = `url('${imageDirectory}${randomImage}')`;
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });

    // recall the function
    setTimeout(setRandomBackground, delay);
}

// Call the function to set a random background on page load
window.onload = () => {
    setTimeout(setRandomBackground, 3000);
};