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
				'link' => 'aaa',
				'description' => 'AAA',
				'image' => 'aaa.jpg'
			),
			array(
				'link' => 'bbb',
				'description' => 'BBB',
				'image' => 'bbb.jpg'
			)
		);

		return $navigation;
	};

	// Authentication
	$container['flash'] = function($c){
		return new Slim\Flash\Messages();
	};