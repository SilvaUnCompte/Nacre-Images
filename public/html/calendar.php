<link rel="stylesheet" href="/public/styles/pages/calendar/calendar.css">

<main id="calendar">
    <div id="session-container">
        <?php

        // $colors = [];
        // $colorStart = [181, 125, 14];
        // $colorEnd = [78, 216, 72];
        // $steps = count($workshopSessions);

        // for ($i = 0; $i < $steps; $i++) {
        //     $r = (int)($colorStart[0] + ($colorEnd[0] - $colorStart[0]) * ($i / ($steps - 1)));
        //     $g = (int)($colorStart[1] + ($colorEnd[1] - $colorStart[1]) * ($i / ($steps - 1)));
        //     $b = (int)($colorStart[2] + ($colorEnd[2] - $colorStart[2]) * ($i / ($steps - 1)));
        //     $colors[] = sprintf("#%02x%02x%02x", $r, $g, $b);
        // }

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
                echo    '</div>';
                echo '</div>';
                echo '<hr>';
            }
            if ($newMonthYear !== $monthYear) {
                echo '<div class="month-row-' . $flexDirection . '">';
                echo    '<div class="col-month">';
                echo        '<h2 class="month-year">' . $newMonthYear . '</h2>';
                echo    '</div>';
                echo    '<div class="col-session">';
                $flexDirection = ($flexDirection + 1) % 2;
                $monthYear = $newMonthYear;
            }

                echo    '<a class="a-session" href="/stage/' . $workshopType['url'] . '">';
                echo        '<div class="session-card" style="background-image: url(\'assets/images/topics/' . $workshopType["img_name"] . '\')">';
                echo            '<p class="session-date">' . $dayMonth . '</p>'; // extension=php_intl.dll
                echo            '<div class="session-info">';
                echo                '<p class="session-name">' . $workshopType["topic_name"] . '</p>';
                echo                '<p>' . $session['additional_information'] . '</p>';
                echo            '</div>';
                echo        '</div>';
                // echo '<section class="session-card-bottom" style="background-image: url(\'assets/images/topics/Line/' . $workshopType["img_name"] . '\')">';
                // echo        '<section class="session-card-bottom">';
                // echo        '</section>';
                echo    '</a>';
        }
        ?>
    </div>
</main>

<br><br><br>