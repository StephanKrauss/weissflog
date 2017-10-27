<?php

// Front , Startseite
$app->get('/' , $container[\App\Controller\Start\StartController::class]);

// Front , statische Seiten
$app->get('/seite/{name}' , $container[\App\Controller\Start\StartController::class]);

// Front , Kategorieseiten
$app->get('/kategorie/{name}' , $container[\App\Controller\Start\StartController::class]);

// Admin , Dashboard
$app->get('/admin/', $container[\Admin\Controller\Dashboard\DashboardController::class]);
$app->post('/admin/', $container[\Admin\Controller\Dashboard\DashboardController::class]);

// Admin , Login - Bereich
$app->any('/admin/login', $container[\Admin\Controller\Login\LoginController::class]);