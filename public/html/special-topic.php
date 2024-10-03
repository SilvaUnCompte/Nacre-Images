<link rel="stylesheet" href="/public/styles/pages/special-topics/special-topics.css">

<section class="main-section">

    <div id="title-container">
        <h1 class="big-h1"><?php echo $topic ?></h1>
        <hr><br>
    </div>
    <div class="inline-container container">
        <img src="<?php echo $image ?>" alt=<?php echo $alt_image ?>>
        <div>
            <h2 class="big-h2">
                <?php echo $title ?>
            </h2>

            <p class="paragraph">
                <?php echo $paragraph; ?>
            </p>
        </div>
    </div>

</section>