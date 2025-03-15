<link rel="stylesheet" href="/public/styles/pages/calendar/calendar.css">

<br><br>

<main class="container">
    <h1>Calendrier des stages</h1>

    <div class="particle particle-1"></div>
    <div class="particle particle-2"></div>
    <div class="particle particle-3"></div>
    <div class="particle particle-4"></div>

    <div class="calendar">
        <?php

        $monthYear = '';
        $flexDirection = 0;
        foreach ($workshopSessions as $session) {
            $workshopType = array_filter($workshopTypes, function ($type) use ($session) {
                return $type['id'] === $session['type'];
            });
            $workshopType = reset($workshopType);

            $dayMonth = IntlDateFormatter::formatObject(new DateTimeImmutable($session['date']), 'd MMMM', 'fr');
            $newMonthYear = ucfirst(IntlDateFormatter::formatObject(new DateTimeImmutable($session['date']), 'MMMM YYYY', 'fr'));


            if ($newMonthYear !== $monthYear && $monthYear !== '') {
                echo '</div>
                    </section>';
            }
            if ($newMonthYear !== $monthYear) {
                echo '<section class="month-section">
                        <div class="month-header">
                            <h2 class="month-title">' . $newMonthYear . '</h2>
                        <div class="month-divider"></div>
                    </div>

                    <div class="courses">';

                $flexDirection = ($flexDirection + 1) % 2;
                $monthYear = $newMonthYear;
            }

            echo '<a class="course" href="/stage/' . $workshopType['url'] . '">
                    <img class="course-bg" src=\'assets/images/topics/' . $workshopType["img_name"] . '\' alt="' . $workshopType["topic_name"] . '">
                    <div class="course-overlay"></div>
                    <div class="course-gradient"></div>
                    <div class="course-content">
                        <h3 class="course-title">' . $workshopType["topic_name"] . '</h3>
                        <p>' . $session['additional_information'] . '</p>
                        <span class="course-date">' . $dayMonth . '</span>
                    </div>
                </a>'; // extension=php_intl.dll
        }
        ?>
    </div>
</main>

<br><br><br>

<link rel="stylesheet" href="/public/styles/generics/star.css">