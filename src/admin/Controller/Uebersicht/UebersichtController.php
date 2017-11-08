<?php

	namespace Admin\Controller\Uebersicht;

	use Slim\Http\Request;
	use Slim\Http\Response;
	use Slim\Http\UploadedFile;

	/**
	 * Darstellung der Startseite
	 *
	 * @author Stephan Krauss
	 * @date 29.08.2017
	 * @file Start.php
	 */
	class UebersichtController
	{
		use \Admin\Tool\CheckLogin;

		protected $view;
		protected $loginValue = null;
		protected $categories = [];

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
				// löschen Artikel
				if(count($params) == 2)
					$this->deleteArticle($params);

				// ermitteln Startparams
				$twigParams = [];

				// bestimmen des Login - Cookie
				$loginCookie = \Dflydev\FigCookies\FigRequestCookies::get($request, 'login');
				$loginValueCookie = $loginCookie->getValue();

				$loginFlag = false;

				// Kontrolle Login
				list($allPostVars, $response, $loginFlag) = $this->testLogin($request, $response, $loginValueCookie);

				if(!$loginFlag)
					return $this->view->render( $response, 'login.tpl', $twigParams);

				$table = $this->findAllArticles();

				$twigParams['tabelle'] = $table;
				$twigParams['page'] = 'uebersichtArtikel.tpl';

				return $this->view->render( $response, 'uebersicht.tpl', $twigParams);
			}
			catch(StartException $e){
				throw $e;
			}
		}

		protected function deleteArticle($params)
		{
			if(array_key_exists('categorie', $params)){
				if(array_key_exists('file', $params)){
					$dir = __DIR__;
					$path = realpath($dir.'../../../../../public/categorie/'.$params['categorie'].'/');
					$file = $path . '/' . $params['file'] . '.md';

					$kontrolle = unlink($file);
				}
			}

			return;
		}

		/**
		 * findet alle vorhandene Artikel
		 *
		 * @return array
		 */
		protected function findAllArticles()
		{
			$allArticle = new \Admin\Model\AllArticle\AllArticle();

			$table = $allArticle
				->setCategories($this->categories)
				->work()
				->getAllArticles();

			return $table;
		}
	}
