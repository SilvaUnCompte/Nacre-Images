<?php
// URL de base de ton site
$baseUrl = 'https://www.stages-photos-nacre-images.fr';

// Obtenir le chemin courant de l'URL
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Séparer en segments de chemin (ex : ["stage", "macrocreative"])
$segments = explode('/', $uri);

// Construire le fil d’Ariane
$breadcrumbList = [
    "@context" => "https://schema.org",
    "@type" => "BreadcrumbList",
    "itemListElement" => []
];

// Ajouter "Accueil"
$breadcrumbList["itemListElement"][] = [
    "@type" => "ListItem",
    "position" => 1,
    "name" => "Accueil",
    "item" => $baseUrl . '/'
];

// Générer les autres niveaux
$currentPath = '';
foreach ($segments as $index => $segment) {
    if ($segment === '') continue;
    $currentPath .= '/' . $segment;
    $breadcrumbList["itemListElement"][] = [
        "@type" => "ListItem",
        "position" => $index + 2,
        "name" => ucwords(str_replace(['-', '_'], ' ', $segment)),
        "item" => $baseUrl . $currentPath
    ];
}


// Données de l'organisation (à personnaliser)
$organization = [
    "@context" => "https://schema.org",
    "@type" => "Organization",
    "name" => "Nacre Images",
    "url" => $baseUrl,
    "logo" => $baseUrl . "/images/logo/logo-no-bg.png",
    "contactPoint" => [
        [
            "@type" => "ContactPoint",
            "telephone" => "+33-6-61-75-55-13",
            "contactType" => "customer support",
            "areaServed" => "FR",
            "availableLanguage" => ["French"]
        ],
        [
            "@type" => "ContactPoint",
            "email" => "contact@nacre-images.fr",
            "contactType" => "customer support",
            "areaServed" => "FR",
            "availableLanguage" => ["French"]
        ]
    ],
    "sameAs" => [
        "www.facebook.com/Dalt.Gilles"
    ]
];
?>

<script type="application/ld+json">
<?= json_encode($breadcrumbList, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
</script>


<script type="application/ld+json">
<?= json_encode($organization, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
</script>