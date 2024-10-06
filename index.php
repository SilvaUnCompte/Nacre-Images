<?php

$request = $_SERVER['REQUEST_URI'];
// $_SERVER['DOCUMENT_ROOT'] = __DIR__;

switch ($request) { // TODO: dans la site map avoir l'ensemble des pages de topics + faire 
    case '':
    case '/':
    case '/index.htm':
        require __DIR__ . '/controler/pages/index.php';
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
    case '/calendrier.htm':
        require __DIR__ . '/controler/pages/calendar.php';
        break;

    case '/infos-stage':
    case '/tarifs.htm':
    case '/themes.htm':
        require __DIR__ . '/controler/pages/workshop-info.php';
        break;

    case '/formateurs':
    case '/formateurs.htm':
        require __DIR__ . '/controler/pages/trainers.php';
        break;

    case '/prestations':
    case '/reportages.htm':
        require __DIR__ . '/controler/pages/services.php';
        break;

    case '/mentions-legals':
    case '/mentionslegales.htm':
        require __DIR__ . '/controler/pages/legal-notice.php';
        break;

    case '/cgv':
    case '/cgv.htm':
        require __DIR__ . '/controler/pages/terms.php';
        break;

    case '/faq':
    case '/Lafaq.htm':
        require __DIR__ . '/controler/pages/faq.php';
        break;

    default:
        if (str_starts_with($request, '/topic/')) {
            require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_type.php');
            $workshop_types = WorkshopType::get_all();

            $url = substr($request, 7);

            foreach ($workshop_types as $workshop_type) {
                if ($workshop_type['url'] === $url) {
                    $topic_id = $workshop_type['id'];
                    break;
                }
            }

            require __DIR__ . '/controler/pages/topic.php';

        } else {
            http_response_code(404);
            require __DIR__ . '/controler/404.php';
        }
}
