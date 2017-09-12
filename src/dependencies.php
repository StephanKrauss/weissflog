<?php
/***** Front *****/

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

// Controller
$container[\App\Controller\Start\StartController::class] = function($c){
	return new \App\Controller\Start\StartController(
		$c['view'],
		$c[\App\Model\Category\Category::class],
		$c['categories']
	);
};

/***** Admin *****/


// Model
$container[Admin\Model\Upload\Upload::class] = function($c)
{
	return new \Admin\Model\Upload\Upload();
};

$container[Admin\Model\Article\Article::class] = function($c)
{
	return new \Admin\Model\Article\Article(
		$c[\Admin\Model\Upload\Upload::class]
	);
};

// Controller
$container[\Admin\Controller\Dashboard\DashboardController::class] = function($c){
	return new \Admin\Controller\Dashboard\DashboardController(
		$c['view'],
		$c[Admin\Model\Article\Article::class]
	);
};
