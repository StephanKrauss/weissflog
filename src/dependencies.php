<?php

// Controller Front
$container[\App\Controller\Start\StartController::class] = function($c){
	return new \App\Controller\Start\StartController(
		$c['view']
	);
};

$container[\App\Controller\Kategorie\KategorieController::class] = function($c){
	return new \App\Controller\Kategorie\KategorieController(
		$c['view']
	);
};

// Model Front
$container[\App\Model\Navigation\NavigationModel::class] = function($c){
	return new \App\Model\Navigation\NavigationModel();
};

// Controller Admin
$container[\Admin\Controller\Dashboard\DashboardController::class] = function($c){
	return new \Admin\Controller\Dashboard\DashboardController(
		$c['view']
	);
};
