<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

$container = $app->getContainer();

// allgemeine Definition
require __DIR__ . '/../src/container.php';

// Abhängigkeiten
require __DIR__ . '/../src/dependencies.php';

// Register routes
require __DIR__ . '/../src/routes.php';

// Middleware
// require __DIR__ . '/../src/CheckAdmin.php';
// $app->add( new CheckAdmin() );

$app->add(function($request, $response, $next) use($settings){
	$path = $request->getUri()->getPath();

	if(strstr($path,'admin')){

		// Ermittlung des Login - Cookie
		$loginCookie = \Dflydev\FigCookies\FigRequestCookies::get($request, 'login');
		$loginValue = $loginCookie->getValue();

		// Login fehlt
		if( $loginValue != $settings['login'] ){
			$response->withStatus(200)->withHeader('Location', '/admin/login');
		}
	}

	return $response;
});

// Run app
$app->run();