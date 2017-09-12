<?php
// Tools
$container[\Parsedown::class] = function($c){
	return new Parsedown();
};

// Model Front
$container[\App\Model\Category\Category::class] = function($c){
	return new \App\Model\Category\Category(
		$c[\Parsedown::class]
	);
};

// Controller Front
$container[\App\Controller\Start\StartController::class] = function($c){
	return new \App\Controller\Start\StartController(
		$c['view'],
		$c[\App\Model\Category\Category::class],
		$c['categories']
	);
};



// Controller Admin
$container[\Admin\Controller\Dashboard\DashboardController::class] = function($c){
	return new \Admin\Controller\Dashboard\DashboardController(
		$c['view']
	);
};
