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
		protected $view;
		protected $modelArticle = null;
		protected $categories = [];
		protected $toolUpload = null;
		protected $position = [1,2,3,4,5,6,7,8,9,10];

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
			\Admin\Model\Upload\Upload $toolUpload
		) {
			$this->view = $view;
			$this->modelArticle = $modelArticle;
			$this->categories = $categories;
			$this->toolUpload = $toolUpload;
		}

		public function __invoke(Request $request, Response $response, array $params)
		{
			try{
				$twigParams = [];

				if( $request->isGet() )
				{
					$twigParams = $this->get($twigParams, $this->categories, $this->position);

					return $this->view->render( $response, 'dashboard.tpl', $twigParams);
				}
				elseif($request->isPost()){
					$allPostVars = $request->getParsedBody();
					$allPostVars['time'] = mktime();

					$uploadedFiles = $request->getUploadedFiles();

					$this->post($allPostVars);

					if( (is_array($uploadedFiles)) and (count($uploadedFiles) > 0) )
						$filename = $this->upload($uploadedFiles, $allPostVars['time']);

					$twigParams['categories'] = $this->categories;
					$twigParams['page'] = 'dashboardStart.tpl';
					$twigParams['positionen'] = $this->position;

					return $this->view->render( $response, 'dashboard.tpl', $twigParams);
				}

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
			else
				throw new DashboardException('uploaded file not correct', 3);

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
		protected function get(array $twigParams, array $categories,array $position)
		{
			$twigParams = [
				'wert1' => 'aaaaaaaaaa',
				'wert2' => 'bbbbbbbbbb',
				'page' => 'dashboardStart.tpl',
				'categories' => $categories,
				'positionen' => $position
			];

			return $twigParams;
		}

	}
