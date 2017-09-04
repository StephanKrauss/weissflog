<?php

	namespace Admin\Controller\Dashboard;

	use Slim\Http\Request;
	use Slim\Http\Response;

	/**
	 * Darstellung der Startseite
	 *
	 * @author Stephan Krauss
	 * @date 29.08.2017
	 * @file Start.php
	 */
	class DashboardController
	{
		protected $view;

		public function __construct(
			\Slim\Views\Twig $view
		) {
			$this->view = $view;
		}

		public function __invoke(Request $request, Response $response)
		{
			try{

				$testgggg = "awfaasdadasdasd";

				if( $request->isGet() )
				{
					$content = array(
						'page' => ''
					);

					$content = [
						'wert1' => 'aaaaaaaaaa',
						'wert2' => 'bbbbbbbbbb'
					];

					return $this->view->render( $response, 'dashboard.tpl', $content);
				}
			}
			catch(StartException $e){
				throw $e;
			}
		}

	}
