<?php

if (!isset($next_sessions) || empty($next_sessions)) {
    echo "<div class='session-title'>Aucune session à venir</div>";
    return;
} elseif (count($next_sessions) > 1) {
    echo "<div class='session-title'>Sessions à venir</div>";
} else {
    echo "<div class='session-title'>Une seule session à venir</div>";
}

echo "<div class='sessions'>";

foreach ($next_sessions as $next_session) {
    $date = new DateTime($next_session['date']);
    $formatted_date = $date->format('d/m/Y');
    echo "<div class='session'>
            <p>$formatted_date</p>
          </div>";
}

echo "</div>";