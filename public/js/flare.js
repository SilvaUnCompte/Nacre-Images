function createFlare() {
    const flare = document.querySelector('.flare');
    if (!flare) return;
    
    for (let i = 0; i < 20; i++) {
        const particle = document.createElement('div');
        particle.classList.add('flare-particle');
        
        // Random position
        particle.style.left = `${Math.random() * 100}%`;
        particle.style.top = `${Math.random() * 100}%`;
        
        // Random size
        const size = Math.random() * 50 + 10;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        
        // Random animation
        particle.style.animationDuration = `${Math.random() * 10 + 5}s`;
        particle.style.animationDelay = `${Math.random() * 5}s`;
        
        // Random color
        const colors = ['#ff3e78', '#00d9ff', '#ffcc00', '#7c4dff'];
        particle.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        
        flare.appendChild(particle);
    }
}

createFlare();