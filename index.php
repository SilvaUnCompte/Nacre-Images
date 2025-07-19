<?php

define('ROOT_DIR', __DIR__);
$request = strtok($_SERVER['REQUEST_URI'], '?');

switch ($request) {
    case '':
    case '/':
    case '/index.htm':
    case '/accueil':
        require __DIR__ . '/controler/pages/index.php';
        break;
    case '/BingSiteAuth.xml':
        require __DIR__ . '/BingSiteAuth.xml';
        break;

    case '/contact':
    case '/contact.htm':
        require __DIR__ . '/controler/pages/contact.php';
        break;

    case '/cheque-cadeau':
    case '/chequescadeau.htm':
        require __DIR__ . '/controler/pages/gift.php';
        break;

    case '/calendrier':
        require __DIR__ . '/controler/pages/calendar.php';
        break;

    case '/calendrier.htm':
        header('Location: /calendrier');
        break;

    case '/infos-stage':
    case '/themes.htm':
        require __DIR__ . '/controler/pages/workshop-info.php';
        break;

    case '/reportages.htm':
    case '/prestations':
        require __DIR__ . '/controler/pages/services.php';
        break;

    case '/prestations/studio':
        require __DIR__ . '/controler/pages/studio.php';
        break;

    case '/prestations/packshot':
        require __DIR__ . '/controler/pages/packshot.php';
        break;

    case '/prestations/mariage':
        require __DIR__ . '/controler/pages/wedding.php';
        break;

    case '/mentions-legals':
    case '/mentionslegales.htm':
        require __DIR__ . '/controler/pages/legal-notice.php';
        break;

    case '/cgv':
    case '/cgv.htm':
        require __DIR__ . '/controler/pages/cgv.php';
        break;

    case '/faq':
    case '/Lafaq.htm':
        require __DIR__ . '/controler/pages/faq.php';
        break;

    case '/tarifs.htm':
    case '/stage/tarifs':
        require __DIR__ . '/controler/pages/tarif.php';
        break;
    
    case '/plan-du-site':
        require __DIR__ . '/controler/pages/sitemap.php';
        break;

    case '/dashboard':
    case '/dashboard/':
    case '/mon-fils-cest-le-meilleur':
        require __DIR__ . '/controler/dashboard/dashboard-home.php';
        break;

    case '/dashboard/login':
        require __DIR__ . '/controler/dashboard/login/login-page.php';
        break;

    case '/dashboard/calendrier':
        require __DIR__ . '/controler/dashboard/calendar.php';
        break;

    case '/dashboard/tarifs':
        require __DIR__ . '/controler/dashboard/tarifs.php';
        break;

    case '/dashboard/liste-des-stages':
        require __DIR__ . '/controler/dashboard/stage-list.php';
        break;

    case '/dashboard/faq':
        require __DIR__ . '/controler/dashboard/faq.php';
        break;

    case '/dashboard/news':
        require __DIR__ . '/controler/dashboard/news.php';
        break;

    case '/dashboard/prestations':
        require __DIR__ . '/controler/dashboard/services.php';
        break;

    case '/dashboard/liste-des-stages/edit':
        require __DIR__ . '/controler/dashboard/stage-editor.php';
        break;

    default:
        if (str_starts_with($request, '/stage/')) {
            require_once(ROOT_DIR . '/database/tables/workshop_type.php');
            $workshop_types = WorkshopType::getAll();

            $url = substr($request, 7);

            foreach ($workshop_types as $workshop_type) {
                if ($workshop_type['url'] === $url) {
                    $topic_id = $workshop_type['id'];
                    require __DIR__ . '/controler/pages/topic.php';
                    return;
                }
            }

            header('Location: /infos-stage');
            return;
        }

        if (str_starts_with($request, '/api/')) {
            $url = substr($request, 5);
            require_once(__DIR__ . '/database/api/' . $url . '.php');

            return;
        }

        http_response_code(404);
        require __DIR__ . '/controler/404.php';
}
