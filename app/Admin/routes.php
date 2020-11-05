<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('sections', SectionController::class);
    $router->resource('promotions', PromotionController::class);
    $router->resource('cours', CoursController::class);
    $router->resource('enseignants', EnseignantController::class);
    $router->resource('etudiants', EtudiantController::class);
    $router->resource('annee-accademiques', AnneeAccademiqueController::class);

    $router->get('/deliberations', 'DeliberationController@index');
    $router->get('/deliberations/annee-accademique/{idAnnee}', 'DeliberationController@promotions');
    $router->get('/deliberations/annee-accademique/{idAnnee}/promotions/{idPromo}', 'DeliberationController@annee');
    $router->resource('promo-etudiants', PromoEtudiantController::class);


    // Api
    $router->get('/api/etudiants/all', 'EtudiantController@all');
    $router->get('/api/promotions/all', 'PromotionController@all');
    $router->get('/api/annee-accademiques/all', 'AnneeAccademiqueController@all');
});
