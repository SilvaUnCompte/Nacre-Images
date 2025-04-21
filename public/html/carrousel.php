<?php
$image_directory = '/assets/images/' . $carrousel_img_dir;

if (!is_dir($_SERVER['DOCUMENT_ROOT'] . $image_directory)) {
    return;
}

$images = array_diff(scandir($_SERVER['DOCUMENT_ROOT'] . $image_directory), ['..', '.']);

if (empty($images)) {
    return;
}

echo '<link rel="stylesheet" href="/public/styles/carrousel.css">
    <div class="carrousel-container">
        <button class="carrousel-button carrousel-button-prev">&lt;</button>
    <div class="carrousel-track">';

foreach ($images as $key => $value) {
    echo '<div class="carrousel-slide">
        <img src="' . $image_directory . '/' . $value . '" alt="Carrousel Image ' . $key . '" loading="lazy" class="carrousel-image">
    </div>';
}

echo '</div>
        <button class="carrousel-button carrousel-button-next">&gt;</button>
    </div>

    <script src="/public/js/carrousel.js" defer></script>';
    
?>