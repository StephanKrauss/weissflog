<?php

	namespace App\Controller\Start;

	use Slim\Http\Request;
	use Slim\Http\Response;

	/**
	 * Darstellung der Startseite
	 *
	 * @author Stephan Krauss
	 * @date 29.08.2017
	 * @file Start.php
	 */
	class StartController
	{
		protected $view;

		public function __construct(
			\Slim\Views\Twig $view
		) {
			$this->view = $view;
		}

		public function __invoke(Request $request, Response $response, array $params)
		{
			try{
//				$navigation = new \App\Model\Navigation\NavigationModel();
//				$navigation->setNavigation($params['name']);

				if( $request->isGet() )
				{
					$templateVars = [];

					// Navigation
					if( is_array($params) and (count($params) > 0) ){
						$content[$params['name']] = 'active';
						$seite = $params['name'].".md";
					}
					else{
						$content['uebersicht'] = 'active';
						$seite = 'uebersicht.md';
					}

					$content = file_get_contents('page/'.$seite);
					$parseDownParser = new \Parsedown();
					$templateVars['page'] = $parseDownParser->text($content);

					return $this->view->render( $response, 'start.tpl', $templateVars);
				}
			}
			catch(StartException $e){
				throw $e;
			}
		}

	}
