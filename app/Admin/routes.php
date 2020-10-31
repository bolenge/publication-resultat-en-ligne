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

});
