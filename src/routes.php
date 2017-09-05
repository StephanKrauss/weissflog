<?php

// Front , Startseite
$app->get('/' , $container[\App\Controller\Start\StartController::class]);

// Front , statische Seiten
$app->get('/seite/{name}' , $container[\App\Controller\Start\StartController::class]);

// Front , Kategorieseiten
$app->get('/kategorie/' , $container[\App\Controller\Kategorie\KategorieController::class]);

// Admin , Dashboard
$app->get('/admin/', $container[\Admin\Controller\Dashboard\DashboardController::class]);