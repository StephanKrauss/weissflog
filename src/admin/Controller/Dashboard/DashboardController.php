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
		protected $modelArticle = null;
		protected $categories = [];

		/**
		 * DashboardController constructor.
		 *
		 * @param \Slim\Views\Twig $view
		 * @param \Admin\Model\Article\Article $modelArticle
		 */
		public function __construct(
			\Slim\Views\Twig $view,
			\Admin\Model\Article\Article $modelArticle,
			array $categories
		) {
			$this->view = $view;
			$this->modelArticle = $modelArticle;
			$this->categories = $categories;
		}

		public function __invoke(Request $request, Response $response, array $params)
		{
			try{
				$twigParams = [];

				if( $request->isGet() )
				{
					$twigParams = $this->get($twigParams, $this->categories);

					return $this->view->render( $response, 'dashboard.tpl', $twigParams);
				}
				elseif($request->isPost()){
					$allPostVars = $request->getParsedBody();
					$this->post($allPostVars);
					$twigParams['categories'] = $this->categories;
					$twigParams['page'] = 'dashboardStart.tpl';

					return $this->view->render( $response, 'dashboard.tpl', $twigParams);
				}

			}
			catch(StartException $e){
				throw $e;
			}
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
				->setTime(mktime())
				->setCategory($params['category'])
				->work();

			return;
		}

		/**
		 * Start Admin -Bereich
		 */
		protected function get(array $twigParams, array $categories)
		{
			$twigParams = [
				'wert1' => 'aaaaaaaaaa',
				'wert2' => 'bbbbbbbbbb',
				'page' => 'dashboardStart.tpl',
				'categories' => $categories
			];

			return $twigParams;
		}

	}
