<?php

// Controller Front
$container[\App\Controller\Start\StartController::class] = function($c){
	return new \App\Controller\Start\StartController(
		$c['view']
	);
};

// Controller Admin
$container[\Admin\Controller\Dashboard\DashboardController::class] = function($c){
	return new \Admin\Controller\Dashboard\DashboardController(
		$c['view']
	);
};
