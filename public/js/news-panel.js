let autoSwitchTimeout = null;
const rawData = JSON.parse(document.getElementById(`news-raw-data`).innerText);
initNewsStrip(rawData);

function initNewsStrip(newsItems) {
    let currentIndex = -1;
    const strip = document.getElementById(`news-strip`);
    const titleElement = document.getElementById(`news-title`);
    const textElement = document.getElementById(`news-text`);
    const dateElement = document.getElementById(`news-date`);
    const navElement = document.getElementById(`news-nav`);
    let navDots = [];

    // Créer les points de navigation
    if (newsItems.length > 1) {
        newsItems.forEach((_, index) => {
            const dot = document.createElement('div');
            dot.className = 'nav-dot';
            if (index === 0) dot.classList.add('active');
            dot.addEventListener('click', () => switchTo(index));
            navElement.appendChild(dot);
        });

        navDots = navElement.querySelectorAll('.nav-dot');
    }

    function switchTo(index) {
        if (index === currentIndex) return;

        // Animation de sortie
        titleElement.classList.add('fade-out');
        textElement.classList.add('fade-out');

        setTimeout(() => {
            // Changer le contenu
            const currentNews = newsItems[index];
            const stringDate = new Date(currentNews.start_date).toLocaleDateString('fr-FR', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });

            titleElement.textContent = currentNews.title;
            textElement.textContent = currentNews.info;
            dateElement.textContent = stringDate;
            currentIndex = index;

            // Mettre à jour les points de navigation
            navDots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });

            // Animation d'entrée
            titleElement.classList.remove('fade-out');
            textElement.classList.remove('fade-out');
        }, 150);

        startAutoSwitch();
    }

    // Initialiser avec le premier élément
    switchTo(0);

    // Changement automatique toutes les 15 secondes
    function startAutoSwitch() {
        if (autoSwitchTimeout) clearInterval(autoSwitchTimeout);
        autoSwitchTimeout = setInterval(() => {
            const nextIndex = (currentIndex + 1) % newsItems.length;
            switchTo(nextIndex);
        }, 15000);
    }

    // Clic sur le bandeau pour passer au suivant
    strip.addEventListener('click', (e) => {
        if (!e.target.classList.contains('nav-dot')) {
            const nextIndex = (currentIndex + 1) % newsItems.length;
            switchTo(nextIndex);
        }
    });
}