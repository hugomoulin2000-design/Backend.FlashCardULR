<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin' => [[['_route' => 'admin', '_controller' => 'App\\Controller\\Admin\\DashboardController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => null, 'crudAction' => null], null, null, null, false, false, null]],
        '/admin/deck' => [[['_route' => 'admin_deck_index', '_controller' => 'App\\Controller\\Admin\\DeckCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\DeckCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/deck/new' => [[['_route' => 'admin_deck_new', '_controller' => 'App\\Controller\\Admin\\DeckCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\DeckCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/deck/batch-delete' => [[['_route' => 'admin_deck_batch_delete', '_controller' => 'App\\Controller\\Admin\\DeckCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\DeckCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/admin/deck/autocomplete' => [[['_route' => 'admin_deck_autocomplete', '_controller' => 'App\\Controller\\Admin\\DeckCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\DeckCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/admin/deck/render-filters' => [[['_route' => 'admin_deck_render_filters', '_controller' => 'App\\Controller\\Admin\\DeckCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\DeckCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/admin/flashcard' => [[['_route' => 'admin_flashcard_index', '_controller' => 'App\\Controller\\Admin\\FlashcardCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\FlashcardCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/flashcard/new' => [[['_route' => 'admin_flashcard_new', '_controller' => 'App\\Controller\\Admin\\FlashcardCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\FlashcardCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/flashcard/batch-delete' => [[['_route' => 'admin_flashcard_batch_delete', '_controller' => 'App\\Controller\\Admin\\FlashcardCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\FlashcardCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/admin/flashcard/autocomplete' => [[['_route' => 'admin_flashcard_autocomplete', '_controller' => 'App\\Controller\\Admin\\FlashcardCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\FlashcardCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/admin/flashcard/render-filters' => [[['_route' => 'admin_flashcard_render_filters', '_controller' => 'App\\Controller\\Admin\\FlashcardCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\FlashcardCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/admin/tag' => [[['_route' => 'admin_tag_index', '_controller' => 'App\\Controller\\Admin\\TagCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TagCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/tag/new' => [[['_route' => 'admin_tag_new', '_controller' => 'App\\Controller\\Admin\\TagCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TagCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/tag/batch-delete' => [[['_route' => 'admin_tag_batch_delete', '_controller' => 'App\\Controller\\Admin\\TagCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TagCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/admin/tag/autocomplete' => [[['_route' => 'admin_tag_autocomplete', '_controller' => 'App\\Controller\\Admin\\TagCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TagCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/admin/tag/render-filters' => [[['_route' => 'admin_tag_render_filters', '_controller' => 'App\\Controller\\Admin\\TagCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TagCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/admin/user' => [[['_route' => 'admin_user_index', '_controller' => 'App\\Controller\\Admin\\UserCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\UserCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/user/new' => [[['_route' => 'admin_user_new', '_controller' => 'App\\Controller\\Admin\\UserCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\UserCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/user/batch-delete' => [[['_route' => 'admin_user_batch_delete', '_controller' => 'App\\Controller\\Admin\\UserCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\UserCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/admin/user/autocomplete' => [[['_route' => 'admin_user_autocomplete', '_controller' => 'App\\Controller\\Admin\\UserCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\UserCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/admin/user/render-filters' => [[['_route' => 'admin_user_render_filters', '_controller' => 'App\\Controller\\Admin\\UserCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\UserCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/logout' => [[['_route' => '_logout_main'], null, null, null, false, false, null]],
        '/api/classement' => [[['_route' => 'app_api_classementapi_rankingall', '_controller' => 'App\\Controller\\Api\\ClassementApiController::rankingAll'], null, ['GET' => 0], null, false, false, null]],
        '/api/decks' => [
            [['_route' => 'api_decks', '_controller' => 'App\\Controller\\Api\\DeckApiController::index'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_deck_create', '_controller' => 'App\\Controller\\Api\\DeckApiController::createDeck'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/my-decks' => [[['_route' => 'api_my_decks', '_controller' => 'App\\Controller\\Api\\DeckApiController::myDecks'], null, ['GET' => 0], null, false, false, null]],
        '/api/flashcards' => [[['_route' => 'api_flashcards', '_controller' => 'App\\Controller\\Api\\FlashcardApiController::index'], null, ['GET' => 0], null, false, false, null]],
        '/api/revision-log' => [[['_route' => 'app_api_revisionlog_logrevision', '_controller' => 'App\\Controller\\Api\\RevisionLogController::logRevision'], null, ['POST' => 0], null, false, false, null]],
        '/api/stats/me' => [[['_route' => 'app_api_stats_stats', '_controller' => 'App\\Controller\\Api\\StatsController::stats'], null, ['GET' => 0], null, false, false, null]],
        '/api/tags' => [
            [['_route' => 'api_tags', '_controller' => 'App\\Controller\\Api\\TagApiController::index'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_tag_create', '_controller' => 'App\\Controller\\Api\\TagApiController::create'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/user/upload' => [[['_route' => 'api_user_upload', '_controller' => 'App\\Controller\\Api\\UserApiController::upload'], null, ['POST' => 0], null, false, false, null]],
        '/api/user/delete-image' => [[['_route' => 'api_user_delete_image', '_controller' => 'App\\Controller\\Api\\UserApiController::deleteImage'], null, ['DELETE' => 0], null, false, false, null]],
        '/api/me' => [[['_route' => 'api_me', '_controller' => 'App\\Controller\\Api\\UserApiController::me'], null, ['GET' => 0], null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\LoginController::login'], null, null, null, false, false, null]],
        '/api/login' => [[['_route' => 'api_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, ['POST' => 0], null, false, false, null]],
        '/api/register' => [[['_route' => 'api_register', '_controller' => 'App\\Controller\\SecurityController::register'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/a(?'
                    .'|dmin/(?'
                        .'|deck/([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:44)'
                                .'|delete(*:57)'
                            .')'
                            .'|(*:65)'
                        .')'
                        .'|flashcard/([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:102)'
                                .'|delete(*:116)'
                            .')'
                            .'|(*:125)'
                        .')'
                        .'|tag/([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:157)'
                                .'|delete(*:171)'
                            .')'
                            .'|(*:180)'
                        .')'
                        .'|user/([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:213)'
                                .'|delete(*:227)'
                            .')'
                            .'|(*:236)'
                        .')'
                    .')'
                    .'|pi/(?'
                        .'|decks/([^/]++)(?'
                            .'|(*:269)'
                            .'|/flashcards(?'
                                .'|(*:291)'
                            .')'
                            .'|(*:300)'
                        .')'
                        .'|flashcards/([^/]++)(?'
                            .'|(*:331)'
                        .')'
                        .'|tags/([^/]++)(?'
                            .'|(*:356)'
                            .'|/decks(*:370)'
                            .'|(*:378)'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:417)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        44 => [[['_route' => 'admin_deck_edit', '_controller' => 'App\\Controller\\Admin\\DeckCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\DeckCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        57 => [[['_route' => 'admin_deck_delete', '_controller' => 'App\\Controller\\Admin\\DeckCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\DeckCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        65 => [[['_route' => 'admin_deck_detail', '_controller' => 'App\\Controller\\Admin\\DeckCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\DeckCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        102 => [[['_route' => 'admin_flashcard_edit', '_controller' => 'App\\Controller\\Admin\\FlashcardCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\FlashcardCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        116 => [[['_route' => 'admin_flashcard_delete', '_controller' => 'App\\Controller\\Admin\\FlashcardCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\FlashcardCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        125 => [[['_route' => 'admin_flashcard_detail', '_controller' => 'App\\Controller\\Admin\\FlashcardCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\FlashcardCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        157 => [[['_route' => 'admin_tag_edit', '_controller' => 'App\\Controller\\Admin\\TagCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TagCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        171 => [[['_route' => 'admin_tag_delete', '_controller' => 'App\\Controller\\Admin\\TagCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TagCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        180 => [[['_route' => 'admin_tag_detail', '_controller' => 'App\\Controller\\Admin\\TagCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TagCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        213 => [[['_route' => 'admin_user_edit', '_controller' => 'App\\Controller\\Admin\\UserCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\UserCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        227 => [[['_route' => 'admin_user_delete', '_controller' => 'App\\Controller\\Admin\\UserCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\UserCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        236 => [[['_route' => 'admin_user_detail', '_controller' => 'App\\Controller\\Admin\\UserCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\UserCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        269 => [[['_route' => 'api_deck_show', '_controller' => 'App\\Controller\\Api\\DeckApiController::showDeck'], ['id'], ['GET' => 0], null, false, true, null]],
        291 => [
            [['_route' => 'api_deck_flashcards', '_controller' => 'App\\Controller\\Api\\DeckApiController::getFlashcardsByDeck'], ['id'], ['GET' => 0], null, false, false, null],
            [['_route' => 'api_flashcard_create', '_controller' => 'App\\Controller\\Api\\FlashcardApiController::create'], ['id'], ['POST' => 0], null, false, false, null],
        ],
        300 => [
            [['_route' => 'api_deck_delete', '_controller' => 'App\\Controller\\Api\\DeckApiController::deleteDeck'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_deck_update', '_controller' => 'App\\Controller\\Api\\DeckApiController::update'], ['id'], ['PATCH' => 0], null, false, true, null],
        ],
        331 => [
            [['_route' => 'api_flashcard_show', '_controller' => 'App\\Controller\\Api\\FlashcardApiController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_flashcard_delete', '_controller' => 'App\\Controller\\Api\\FlashcardApiController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_flashcard_update', '_controller' => 'App\\Controller\\Api\\FlashcardApiController::update'], ['id'], ['PATCH' => 0], null, false, true, null],
        ],
        356 => [[['_route' => 'api_tag_show', '_controller' => 'App\\Controller\\Api\\TagApiController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        370 => [[['_route' => 'api_tag_decks', '_controller' => 'App\\Controller\\Api\\TagApiController::decks'], ['id'], ['GET' => 0], null, false, false, null]],
        378 => [
            [['_route' => 'api_tag_delete', '_controller' => 'App\\Controller\\Api\\TagApiController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_tag_update', '_controller' => 'App\\Controller\\Api\\TagApiController::update'], ['id'], ['PATCH' => 0], null, false, true, null],
        ],
        417 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
