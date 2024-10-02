<link rel="stylesheet" href="/public/styles/pages/topics/topics.css">

<section class="main-section">

    <h1 class="big-h1"><?php echo $topic ?></h1>

    <div class="inline-container container">
        <img src="<?php echo $image ?>" alt=<?php echo $alt_image ?>>
        <div>
            <h2 class="big-h2"><?php echo $title ?></h2>
            <br>
            <p class="paragraph">
                <?php echo $paragraph; ?>
            </p>
        </div>
    </div>

    <br>
    <br>

</section>