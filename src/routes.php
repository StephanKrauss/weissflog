<?php

// Front , Startseite
$app->any('/' , $container[\App\Controller\Start\StartController::class]);

// Front , statische Seiten
$app->get('/seite/{name}' , $container[\App\Controller\Start\StartController::class]);

// Front , Kategorieseiten
$app->get('/kategorie/{name}' , $container[\App\Controller\Start\StartController::class]);

// Admin , Dashboard
$app->any('/admin/', $container[\Admin\Controller\Dashboard\DashboardController::class]);
	$app->any('/admin', $container[\Admin\Controller\Dashboard\DashboardController::class]);

// Admin , Übersicht
$app->any('/admin/uebersicht/', $container[\Admin\Controller\Uebersicht\UebersichtController::class]);