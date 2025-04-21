<link rel="stylesheet" href="/public/styles/pages/faq/faq.css">
<link rel="stylesheet" href="/public/styles/generics/bubble-text.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo+2:400,800&display=swap">

<main id="faq">
    <div id="faq-container">
        <h1>FAQ</h1>
        <div class="flare"></div>

        <?php
        $faq = FAQ::getAll();

        foreach ($faq as $question) {
            echo '<div class="faq-card">';
            echo    '<div class="question-card">';
            echo        '<h2>' . $question['question'] . '</h2>';
            echo    '</div>';
            echo    '<p class="answer">' . $question['answer'] . '</p>';
            echo '</div>';
        }
        ?>

    </div>
    <a class="bubble-text-container" href="/contact">
        <div class="bubble-text">
            <p>
                N'hésitez pas à
                <br>me contacter
                <br>pour toute autre
                <br>question !
            </p>
        </div>
    </a>
</main>

<br><br><br><br>


<link rel="stylesheet" href="/public/styles/generics/star.css">
<script src="/public/js/flare.js"></script>