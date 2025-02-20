<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/consultation' => [[['_route' => 'app_consultation_index', '_controller' => 'App\\Controller\\ConsultationController::index'], null, ['GET' => 0], null, false, false, null]],
        '/consultation/new' => [[['_route' => 'app_consultation_new', '_controller' => 'App\\Controller\\ConsultationController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/docteur' => [[['_route' => 'app_docteur_index', '_controller' => 'App\\Controller\\DocteurController::index'], null, ['GET' => 0], null, false, false, null]],
        '/docteur/new' => [[['_route' => 'app_docteur_new', '_controller' => 'App\\Controller\\DocteurController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/dossiers/medicaux' => [[['_route' => 'app_dossiers_medicaux_index', '_controller' => 'App\\Controller\\DossiersMedicauxController::index'], null, ['GET' => 0], null, false, false, null]],
        '/dossiers/medicaux/new' => [[['_route' => 'app_dossiers_medicaux_new', '_controller' => 'App\\Controller\\DossiersMedicauxController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/' => [[['_route' => 'app_front_index', '_controller' => 'App\\Controller\\HomeController::index'], null, ['GET' => 0], null, false, false, null]],
        '/back' => [[['_route' => 'app_home_index', '_controller' => 'App\\Controller\\HomeController::indexback'], null, ['GET' => 0], null, false, false, null]],
        '/patient' => [[['_route' => 'app_patient_index', '_controller' => 'App\\Controller\\PatientController::index'], null, ['GET' => 0], null, false, false, null]],
        '/patient/new' => [[['_route' => 'app_patient_new', '_controller' => 'App\\Controller\\PatientController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/rendez/vous' => [[['_route' => 'app_rendez_vous_index', '_controller' => 'App\\Controller\\RendezVousController::index'], null, ['GET' => 0], null, false, false, null]],
        '/rendez/vous/new' => [[['_route' => 'app_rendez_vous_new', '_controller' => 'App\\Controller\\RendezVousController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/rendez/vous/newFront' => [[['_route' => 'app_rendez_vous_newFront', '_controller' => 'App\\Controller\\RendezVousController::newFront'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/consultation/([^/]++)(?'
                    .'|(*:227)'
                    .'|/edit(*:240)'
                    .'|(*:248)'
                .')'
                .'|/do(?'
                    .'|cteur/([^/]++)(?'
                        .'|(*:280)'
                        .'|/edit(*:293)'
                        .'|(*:301)'
                    .')'
                    .'|ssiers/medicaux/([^/]++)(?'
                        .'|(*:337)'
                        .'|/edit(*:350)'
                        .'|(*:358)'
                    .')'
                .')'
                .'|/patient/([^/]++)(?'
                    .'|(*:388)'
                    .'|/edit(*:401)'
                    .'|(*:409)'
                .')'
                .'|/rendez/vous/([^/]++)(?'
                    .'|(*:442)'
                    .'|/edit(*:455)'
                    .'|(*:463)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        227 => [[['_route' => 'app_consultation_show', '_controller' => 'App\\Controller\\ConsultationController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        240 => [[['_route' => 'app_consultation_edit', '_controller' => 'App\\Controller\\ConsultationController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        248 => [[['_route' => 'app_consultation_delete', '_controller' => 'App\\Controller\\ConsultationController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        280 => [[['_route' => 'app_docteur_show', '_controller' => 'App\\Controller\\DocteurController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        293 => [[['_route' => 'app_docteur_edit', '_controller' => 'App\\Controller\\DocteurController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        301 => [[['_route' => 'app_docteur_delete', '_controller' => 'App\\Controller\\DocteurController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        337 => [[['_route' => 'app_dossiers_medicaux_show', '_controller' => 'App\\Controller\\DossiersMedicauxController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        350 => [[['_route' => 'app_dossiers_medicaux_edit', '_controller' => 'App\\Controller\\DossiersMedicauxController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        358 => [[['_route' => 'app_dossiers_medicaux_delete', '_controller' => 'App\\Controller\\DossiersMedicauxController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        388 => [[['_route' => 'app_patient_show', '_controller' => 'App\\Controller\\PatientController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        401 => [[['_route' => 'app_patient_edit', '_controller' => 'App\\Controller\\PatientController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        409 => [[['_route' => 'app_patient_delete', '_controller' => 'App\\Controller\\PatientController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        442 => [[['_route' => 'app_rendez_vous_show', '_controller' => 'App\\Controller\\RendezVousController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        455 => [[['_route' => 'app_rendez_vous_edit', '_controller' => 'App\\Controller\\RendezVousController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        463 => [
            [['_route' => 'app_rendez_vous_delete', '_controller' => 'App\\Controller\\RendezVousController::delete'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
