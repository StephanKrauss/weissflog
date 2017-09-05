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
				$templateVars = [];

				$navigationModel = new \App\Model\Navigation\NavigationModel();
				$templateVars['categories'] = $navigationModel->work()->getNavigation();

				// Kopfnavigation
				if( is_array($params) and (count($params) > 0) ){
					$templateVars[$params['name']] = 'active';
					$seite = $params['name'].".md";
				}
				else{
					$templateVars['uebersicht'] = 'active';
					$seite = 'uebersicht.md';
				}

				if( $request->isGet() )
				{
					$templateVars = $this->get($seite, $templateVars);
				}

				return $this->view->render( $response, 'start.tpl', $templateVars);
			}
			catch(StartException $e){
				throw $e;
			}
		}

		/**
		 * parst den Inhalt der statischen Seite
		 *
		 * @param $seite
		 * @param $templateVars
		 *
		 * @return mixed
		 */
		protected function get($seite, $templateVars)
		{
			$content = file_get_contents('page/'.$seite);
			$parseDownParser = new \Parsedown();
			$templateVars['page'] = $parseDownParser->text($content);

			return $templateVars;
		}

	}
