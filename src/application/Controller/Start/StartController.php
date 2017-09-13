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
		protected $modelCategoryContent = null;
		protected $categories = [];

		public function __construct(
			\Slim\Views\Twig $view,
			\App\Model\Category\Category $modelCategoryContent,
			array $categories
		) {
			$this->view = $view;
			$this->modelCategoryContent = $modelCategoryContent;
			$this->categories = $categories;
		}

		public function __invoke(Request $request, Response $response, array $params)
		{
			try{
				$templateVars = [];

				$templateVars['categories'] = $this->categories;

				// Kopfnavigation
				if( is_array($params) and (count($params) > 0) ){
					$templateVars[$params['name']] = 'active';
				}
				else{
					$templateVars['uebersicht'] = 'active';
					$seite = 'uebersicht.md';
				}

				if( $request->isGet() )
				{
					$url = $request->getUri();
					$path = $url->getPath();

					if(strstr($path, 'seite'))
						$templateVars = $this->getPage($params['name'], $templateVars);
					elseif(strstr($path, 'kategorie'))
						$templateVars = $this->getCategorie($params['name'], $templateVars);
					else
						$templateVars = $this->getPage('uebersicht', $templateVars);
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
		protected function getPage($seite, $templateVars)
		{
			// Übersicht
			if($seite == 'uebersicht'){
				$icons = array(
					'categories' => $this->categories
				);

				$templateVars['page'] = $this->view->fetch('startUebersicht.tpl', $icons);
			}
			// statische Seiten
			elseif(is_file('page/'.$seite.".md")){
				$content = file_get_contents('page/'.$seite.'.md');
				$parseDownParser = new \Parsedown();
				$templateVars['page'] = $parseDownParser->text($content);
			}
			// Unbekannt
			else{
				$content = file_get_contents('page/unknown.md');
				$parseDownParser = new \Parsedown();
				$templateVars['page'] = $parseDownParser->text($content);
			}

			return $templateVars;
		}

		/**
		 * Gibt den Inhalt der Kategorie Markdown Files zurück
		 *
		 * @param $categorie
		 *
		 * @return array
		 */
		protected function getCategorie($categoryName, $templateVars)
		{

			$categorieContent = $this->modelCategoryContent;
			$templateVars['page'] = $categorieContent
				->setCategoryName($categoryName)
				->work()
				->getCategoryContent();

			return $templateVars;
		}

	}
