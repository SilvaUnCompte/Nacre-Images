// Particle animation
document.addEventListener('DOMContentLoaded', function() {
    const particlesContainer = document.getElementById('particles-container');
    const particleCount = 50;
    
    // Create particles
    for (let i = 0; i < particleCount; i++) {
        createParticle(particlesContainer);
    }
    
    function createParticle(container) {
        const particle = document.createElement('div');
        
        // Random particle styles
        const size = Math.random() * 5 + 1;
        const posX = Math.random() * 100;
        const posY = Math.random() * 100;
        const opacity = Math.random() * 0.5 + 0.1;
        const duration = Math.random() * 20 + 10;
        const delay = Math.random() * 5;
        
        // Apply styles
        particle.style.position = 'absolute';
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.borderRadius = '50%';
        particle.style.left = `${posX}%`;
        particle.style.top = `${posY}%`;
        particle.style.opacity = opacity;
        particle.style.backgroundColor = getRandomColor();
        particle.style.boxShadow = `0 0 ${size * 2}px ${getRandomColor()}`;
        
        // Animation
        particle.style.animation = `particleFloat ${duration}s infinite ease-in-out`;
        particle.style.animationDelay = `${delay}s`;
        
        // Add keyframes dynamically
        const keyframes = `
            @keyframes particleFloat {
                0% {
                    transform: translate(0, 0);
                }
                25% {
                    transform: translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px);
                }
                50% {
                    transform: translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px);
                }
                75% {
                    transform: translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px);
                }
                100% {
                    transform: translate(0, 0);
                }
            }
        `;
        
        const styleSheet = document.createElement('style');
        styleSheet.textContent = keyframes;
        document.head.appendChild(styleSheet);
        
        container.appendChild(particle);
    }
    
    function getRandomColor() {
        // Blue theme colors
        const colors = ['#4a8fe7', '#00d2ff', '#2b6cb0', '#5cb3ff', '#0077be'];
        return colors[Math.floor(Math.random() * colors.length)];
    }
});