// Create flare elements
const container = document.querySelector('.card-container');
const flareCount = 15;

for (let i = 0; i < flareCount; i++) {
    const flare = document.createElement('div');
    flare.classList.add('white-flare');
    container.appendChild(flare);

    // Set random positions around the card
    const angle = Math.random() * Math.PI * 2;
    const distance = 100 + Math.random() * 150;
    const x = Math.cos(angle) * distance;
    const y = Math.sin(angle) * distance;

    flare.style.left = `calc(50% + ${x}px)`;
    flare.style.top = `calc(50% + ${y}px)`;

    // Set random sizes
    const size = 5 + Math.random() * 10;
    flare.style.width = `${size}px`;
    flare.style.height = `${size}px`;

    // Set less colorful flares (white with varying opacity)
    const opacity = 0.3 + Math.random() * 0.4;
    flare.style.background = `rgba(255, 255, 255, ${opacity})`;
    flare.style.boxShadow = `0 0 15px 5px rgba(255, 255, 255, ${opacity * 0.7})`;

    // Animate with random delays and durations
    const delay = Math.random() * 5;
    const duration = 2 + Math.random() * 3;
    flare.style.animation = `flareAnimation ${duration}s infinite ${delay}s`;
}