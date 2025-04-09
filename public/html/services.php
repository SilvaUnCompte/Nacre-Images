
    <style>
        :root {
            --bg-primary: #121212;
            --bg-secondary: #1e1e1e;
            --text-primary: #f5f5f5;
            --text-secondary: #b3b3b3;
            --accent: #3a7bd5;
            --accent-light:rgb(119, 174, 247);
            --card-bg:#1e263a;
            --border-radius: 8px;
            --transition: all 0.3s ease;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        

        section {
            padding: 60px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .section-title h2 {
            font-size: 2rem;
            font-weight: 400;
            display: inline-block;
            padding-bottom: 10px;
            position: relative;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: var(--accent);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .service-card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            overflow: hidden;
            transition: var(--transition);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .service-content {
            padding: 25px;
        }

        .service-title {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: var(--accent-light);
        }

        .service-price {
            font-weight: 600;
            margin-top: 10px;
            color: var(--text-primary);
        }

        .service-description {
            color: var(--text-secondary);
            margin-bottom: 15px;
        }

        .link {
            color: var(--accent);
            text-decoration: none;
            transition: var(--transition);
        }

        .link:hover {
            color: var(--accent-light);
            text-decoration: underline;
        }

        .other-services {
            background-color: var(--bg-secondary);
            padding: 60px 0;
        }

        .divider {
            height: 1px;
            background-color: rgba(255, 255, 255, 0.1);
            margin: 40px 0;
        }

        @media (max-width: 768px) {
            .services-grid {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 2rem;
            }

            .section-title h2 {
                font-size: 1.8rem;
            }
        }
    </style>

    <section id="reportages">
        <div class="container">
            <div class="section-title">
                <h2>REPORTAGES</h2>
            </div>
            <p class="intro">Je réalise également des clichés sur demande, artistiques, publicitaires... je suis à votre disposition pour tout renseignement.</p>
            
            <h3 style="margin-top: 30px; text-align: center; color: var(--accent);">Tarifs indicatifs</h3>
            
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-content">
                        <h4 class="service-title">Photo de faire part / CV</h4>
                        <p class="service-description">1 à 2 fichiers remis</p>
                        <p class="service-price">90€</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-content">
                        <h4 class="service-title">Studio à domicile</h4>
                        <p class="service-description">Séance photo professionnelle chez vous</p>
                        <p class="service-price">à partir de 120€</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-content">
                        <h4 class="service-title">Séance photo de bébé</h4>
                        <p class="service-description">2h (ou plus selon rythme de l'enfant)<br>Une dizaine de fichiers remis</p>
                        <p class="service-price">210€</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-content">
                        <h4 class="service-title">Séance couple et bébé</h4>
                        <p class="service-description">Intérieur ou extérieur, 2h<br>Une quinzaine de fichiers remis</p>
                        <p class="service-price">250€</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-content">
                        <h4 class="service-title">Famille sur le vif</h4>
                        <p class="service-description">En extérieur, séance de 2h<br>4 personnes max, +40€ par personne supplémentaire (8 personnes max)</p>
                        <p class="service-price">220€</p>
                        <a href="#" class="link">Voir quelques images "bouts d'chou"</a>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-content">
                        <h4 class="service-title">Baptême</h4>
                        <p class="service-description">Cérémonie et photos avec la famille</p>
                        <p class="service-price">350€</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-content">
                        <h4 class="service-title">Mariage</h4>
                        <p class="service-description">Immortalisez votre jour spécial</p>
                        <a href="#" class="link">ACCÈS À LA PAGE DÉDIÉE</a>
                    </div>
                </div>
            </div>
            
            <p style="text-align: center; margin-top: 40px; font-style: italic;">Chaque séance donne accès à une galerie en ligne pour un tirage papier facile de vos photos.</p>
            
            <div class="divider"></div>
            
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-content">
                        <h4 class="service-title">Reportages divers</h4>
                        <p class="service-description">Prise de vue pour illustration site web...</p>
                        <p class="service-price">à partir de 500€ la demi-journée pour un reportage "simple"</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-content">
                        <h4 class="service-title">Photos d'animaux</h4>
                        <p class="service-description">Envie d'immortaliser votre animal de compagnie (chien, chat, lézard, furet etc...)</p>
                        <p class="service-price">à partir de 150€</p>
                        <p class="service-description">Devis détaillé sur demande en fonction de l'animal et de son comportement.</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-content">
                        <h4 class="service-title">Packshot produits</h4>
                        <p class="service-description">Photos professionnelles de vos produits</p>
                        <p class="service-price">à partir de 12€ la photo</p>
                        <a href="#" class="link">Plus d'infos sur ce lien</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="other-services" class="other-services">
        <div class="container">
            <div class="section-title">
                <h2>AUTRES PRESTATIONS</h2>
            </div>
            
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-content">
                        <h4 class="service-title">Retouche photo</h4>
                        <p class="service-description">Envie d'embellir vos fichiers, confiez les nous.</p>
                        <p class="service-price">Devis après analyse</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-content">
                        <h4 class="service-title">Chèques cadeaux</h4>
                        <p class="service-description">Nous vous proposons également l'achat de chèques cadeaux stage à offrir</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-content">
                        <h4 class="service-title">Conseil achat matériel</h4>
                        <p class="service-description">Nous pouvons vous accompagner et vous conseiller pendant l'achat de votre matériel</p>
                        <p class="service-price">35€/h</p>
                    </div>
                </div>
            </div>
        </div>

        <a href="/contact" class="contact-button">
        Me contacter
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14"></path>
            <path d="M12 5l7 7-7 7"></path>
        </svg>
    </a>
    </section>
</body>
</html>

<link rel="stylesheet" href="/public/styles/generics/contact-button.css">