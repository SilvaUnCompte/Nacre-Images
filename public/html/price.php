<br><br><br>

<div class="pricing-section">
    <div class="pricing-header">
        <h1>Les tarifs des stages</h1>
        <p>N'hésitez pas si vous avez une demande précise</p>
    </div>

    <?php

    $prices_groupe = array_filter($prices, function ($price) {
        return $price['type'] === 0;
    });
    $prices_individuel = array_filter($prices, function ($price) {
        return $price['type'] === 1;
    });
    $prices_special = array_filter($prices, function ($price) {
        return $price['type'] === 2;
    });

    $priceMatrix = [
        ["groupe", "En groupe", $prices_groupe],
        ["solo", "Individuel", $prices_individuel],
        ["special", "Spécials", $prices_special]
    ];

    foreach ($priceMatrix as $priceType) {
        echo    '<div class="category-container ' . $priceType[0] . '-category">
                    <h2 class="category-title">' . $priceType[1] . '</h2>
                    <table class="pricing-table">
                        <tbody>';

        foreach ($priceType[2] as $price) {
            echo '<tr>
                    <td>' .
                $price['label'] .
                '<span class="info-container">
                            <span class="info-icon">i</span>
                            <span class="tooltip">' . $price['description'] . '</span>
                        </span>
                    </td>
                    <td>' . $price['price'] . '€</td>
                </tr>';
        }
        echo '</tbody> </table> </div>';
    }

    echo '</div>';

    ?>
</div>

<!-- Contact Section - Professional Style -->
<div class="contact-section">
    <p class="contact-text">Vous avez besoin d'un plan personnalisé ou vous avez des questions sur nos options tarifaires ?</p>
    <a href="/contact" class="contact-button">
        Me contacter
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14"></path>
            <path d="M12 5l7 7-7 7"></path>
        </svg>
    </a>
</div>


<link rel="stylesheet" href="/public/styles/pages/price/price.css">