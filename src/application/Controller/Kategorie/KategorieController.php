<?php

	namespace App\Controller\Kategorie;

	use Slim\Http\Request;
	use Slim\Http\Response;

	/**
	 * Darstellung einer Kategorie
	 *
	 * @author Stephan Krauss
	 * @date 29.08.2017
	 * @file Start.php
	 */
	class KategorieController
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


					$fileContent = file('page/kategorie.md');
					$parsedown = new \Parsedown();

					for($i=0; $i < count($fileContent); $i++){
						$content['page'] .= $parsedown->text($fileContent[$i]);
					}

					return $this->view->render( $response, 'start.tpl', $content);
				}
			}
			catch(StartException $e){
				throw $e;
			}
		}

	}
