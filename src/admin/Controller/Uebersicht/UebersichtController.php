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
		protected $view;
		protected $loginValue = null;

		/**
		 * UebersichtController constructor.
		 *
		 * @param \Slim\Views\Twig $view
		 * @param \Admin\Model\Article\Article $modelArticle
		 */
		public function __construct(
			\Slim\Views\Twig $view,
			$login
		) {
			$this->view = $view;
			$this->loginValue = $login;
		}

		public function __invoke(Request $request, Response $response, array $params)
		{
			try{
				// ermitteln Startparams
				$twigParams = [];

				// bestimmen des Login - Cookie
				$loginCookie = \Dflydev\FigCookies\FigRequestCookies::get($request, 'login');
				$loginValueCookie = $loginCookie->getValue();

				$loginFlag = false;

				return $this->view->render( $response, 'uebersicht.tpl', $twigParams);

			}
			catch(StartException $e){
				throw $e;
			}
		}
	}
