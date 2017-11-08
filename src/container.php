<?php

	// View
	$container['view'] = function ($container) {
		$view = new \Slim\Views\Twig('./template', [
			'cache' => false
		]);

		// Instantiate and add Slim specific extension
		$basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
		$view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

		return $view;
	};

	// Error
	$container['errorHandler'] = function($c){
		return function ($request, $response,\Exception $exception) use ($c)
		{
			$errorMessage = 'Fehler';
			$errorMessage .= 'File: '.$exception->getFile().'<br>';
			$errorMessage .= 'Line: '.$exception->getLine().'<br>';
			$errorMessage .= 'Message: '.$exception->getMessage().'<br>';
			$errorMessage .= 'Code: '.$exception->getCode().'<br>';
			$errorMessage .= '------------------- <br>';

			$errorMessage .= nl2br($exception->getTraceAsString());

			$errorMessage .= '<br> -------------------';

			return $c['response']->withStatus(500)
				->withHeader('Content-Type', 'text/html')
				->write($errorMessage);
		};
	};

	/**
	 * vorhandene Kategorien
	 *
	 * @param $c
	 *
	 * @return array
	 */
	$container['categories'] = function($c)
	{
		$navigation = array(
			array(
				'link' => 'elektronik',
				'description' => 'elektronische Geräte',
				'image' => 'elektronik.jpg'
			),
			array(
				'link' => 'phone',
				'description' => 'Handy',
				'image' => 'phone.jpg'
			),
			array(
				'link' => 'bike',
				'description' => 'Fahrräder',
				'image' => 'bike.jpg'
			),
			array(
				'link' => 'moebel',
				'description' => 'Möbel',
				'image' => 'moebel.jpg'
			),
			array(
				'link' => 'books',
				'description' => 'Bücher',
				'image' => 'books.jpg'
			),
			array(
				'link' => 'lamp',
				'description' => 'Lampen',
				'image' => 'lamp.jpg'
			),
			array(
				'link' => 'toy',
				'description' => 'Spielzeug',
				'image' => 'toy.jpg'
			),
			array(
				'link' => 'pot',
				'description' => 'Haushaltwaren',
				'image' => 'pot.jpg'
			)
		);

		return $navigation;
	};