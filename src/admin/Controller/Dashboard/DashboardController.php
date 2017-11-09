<?php

	namespace Admin\Controller\Dashboard;

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
	class DashboardController
	{
		use \Admin\Tool\CheckLogin;

		protected $view;
		protected $modelArticle = null;
		protected $categories = [];
		protected $toolUpload = null;
		protected $position = [1,2,3,4,5,6,7,8,9,10];
		protected $flash;
		protected $loginValue = null;

		/**
		 * DashboardController constructor.
		 *
		 * @param \Slim\Views\Twig $view
		 * @param \Admin\Model\Article\Article $modelArticle
		 */
		public function __construct(
			\Slim\Views\Twig $view,
			\Admin\Model\Article\Article $modelArticle,
			array $categories,
			\Admin\Model\Upload\Upload $toolUpload,
			$login
		) {
			$this->view = $view;
			$this->modelArticle = $modelArticle;
			$this->categories = $categories;
			$this->toolUpload = $toolUpload;
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

				// Kontrolle Login
				list($allPostVars, $response, $loginFlag) = $this->testLogin($request, $response, $loginValueCookie);

				if(!$loginFlag)
					return $this->view->render( $response, 'login.tpl', $twigParams);

				// Erststart
				if( ( $request->isGet() ) or ( array_key_exists('passwort', $allPostVars ))  )
				{
					// Dummy Params
					$twigParams = $this->erststart($twigParams, $this->categories, $this->position);
				}
				// eintragen
				elseif($request->isPost())
				{
					$allPostVars = $request->getParsedBody();

					$allPostVars['time'] = time();

					$uploadedFiles = $request->getUploadedFiles();

					$this->post($allPostVars);

					if( (is_array($uploadedFiles)) and (count($uploadedFiles) > 0) )
						$filename = $this->upload($uploadedFiles, $allPostVars['time']);

					$twigParams['categories'] = $this->categories;
					$twigParams['page'] = 'dashboardStart.tpl';
					$twigParams['positionen'] = $this->position;
				}

				return $this->view->render( $response, 'dashboard.tpl', $twigParams);

			}
			catch(StartException $e){
				throw $e;
			}
		}

		/**
		 * @param array $allPostVars
		 * @param \Admin\Model\Upload\Upload $toolUpload
		 */
		protected function upload(array $uploadedFiles, $time)
		{
			// handle single input with single file upload
			$uploadedFile = $uploadedFiles['artikelImage'];
			if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
				$filename = move_uploaded_file($uploadedFile->file, 'images/'.$time.'.jpg');
			}
			else{
				$filename = false;
			}

			return $filename;
		}

		/**
		 * anlegen eines neuen Artikel
		 *
		 * @param array $params
		 * @param array $twigParams
		 *
		 * @return array
		 */
		protected function post(array $params)
		{
			$modelArticle = $this->modelArticle;
			$modelArticle
				->setUeberschrift($params['ueberschrift'])
				->setKurzbeschreibung($params['kurzbeschreibung'])
				->setText($params['text'])
				->setTime($params['time'])
				->setPosition($params['position'])
				->setCategory($params['category'])
				->work();

			return;
		}

		/**
		 * Start Admin -Bereich
		 */
		protected function erststart(array $twigParams, array $categories,array $position)
		{
			$twigParams = [
				'page' => 'dashboardStart.tpl',
				'categories' => $categories,
				'positionen' => $position
			];

			return $twigParams;
		}

		/**
		 * setzen des Login Cookie
		 *
		 * @param \Slim\Http\Response $response
		 *
		 * @return \Psr\Http\Message\ResponseInterface|\Slim\Http\Response
		 */
		protected function setPasswortCookie(Response $response)
		{
			$response = \Dflydev\FigCookies\FigResponseCookies::set(
				$response,
				\Dflydev\FigCookies\SetCookie::create('login')
					->withValue($this->loginValue)
					->withPath('/')
					->withHttpOnly(true)
			);

			return $response;
		}
	}
