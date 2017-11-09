<?php

	namespace Admin\Controller\Einzel;

	use Slim\Http\Request;
	use Slim\Http\Response;
	use Slim\Http\UploadedFile;

	/**
	 * Darstellung eines einzelnen Artikel
	 *
	 * @author Stephan Krauss
	 * @date 09.11.2017
	 * @file EinzelController.php
	 */
	class EinzelController
	{
		use \Admin\Tool\CheckLogin;

		protected $view;
		protected $loginValue = null;
		protected $categories = array();


		/**
		 * UebersichtController constructor.
		 *
		 * @param \Slim\Views\Twig $view
		 * @param \Admin\Model\Article\Article $modelArticle
		 */
		public function __construct(
			\Slim\Views\Twig $view,
			$login,
			$categories
		) {
			$this->view = $view;
			$this->loginValue = $login;
			$this->categories = $categories;
		}

		public function __invoke(Request $request, Response $response, array $params)
		{
			try{
				$twigParams = array();

				// bestimmen des Login - Cookie
				$loginCookie = \Dflydev\FigCookies\FigRequestCookies::get($request, 'login');
				$loginValueCookie = $loginCookie->getValue();

				$loginFlag = false;

				// Kontrolle Login
				list($allPostVars, $response, $loginFlag) = $this->testLogin($request, $response, $loginValueCookie);

				if(!$loginFlag)
					return $this->view->render( $response, 'login.tpl', $twigParams);

				$content = $this->determineFileConten($params);

				$twigParams = array(
					'page' => 'einzelArtikel.tpl',
					'ueberschrift' => substr($content[1],2),
					'kurzbeschreibung' => $content[2]
				);

				$text = '';

				for($i = 3; $i < count($content); $i++){
					$text .= $content[$i]."\n";
				}

				$twigParams['text'] = $text;

				$twigParams['categories'] = $this->selectCategorie($this->categories, $params['categorie']);
				// $twigParams['positionen'] = $this->selectPosition($content[0]);
				$twigParams['positionen'] = $this->selectPosition(5);

				return $this->view->render( $response, 'uebersicht.tpl', $twigParams);
			}
			catch(StartException $e){
				throw $e;
			}
		}

		/**
		 * verändert die Reihenfolge der Positionen
		 *
		 * @param $position
		 *
		 * @return mixed
		 */
		protected function selectPosition($position){
			$positionen = array();

			for($i = 0; $i < 10; $i++){
				$positionen[$i] = $i + 1;
			}

			array_unshift($positionen, $position);
			unset($positionen[$position]);
			$positionen = array_merge( $positionen );

			return $positionen;
		}

		/**
		 * veraendert die Reihenfolge der Kategorien
		 *
		 * @param $categories
		 * @param $categorie
		 *
		 * @return mixed
		 */
		protected function selectCategorie($categories, $categorie)
		{
			for($i = 0; $i < count($categories); $i++){
				$test = 123;

				if($categories[$i]['link'] == $categorie){
					array_unshift($categories, $categories[$i]);
					$i++;
					unset($categories[$i]);

					break;
				}
			}

			return $categories;
		}

		/**
		 * @param $params
		 *
		 * @return array
		 */
		protected function determineFileConten($params)
		{
			$content = array();

			$dir = __DIR__;
			$filePath = realpath($dir.'/../../../../public/categorie/'.$params['categorie'].'/');
			$file = $filePath.'\\'.$params['file'].'.md';

			$content = file($file, FILE_IGNORE_NEW_LINES);

			return $content;
		}
	}
