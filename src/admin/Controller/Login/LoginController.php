<?php

	namespace Admin\Controller\Login;

	use Slim\Http\Request;
	use Slim\Http\Response;

	/**
	 * Darstellung der Loginseite
	 *
	 * @author Stephan Krauss
	 * @date 25.09.2017
	 */
	class LoginController
	{
		protected $flash;

		/**
		 * LoginController constructor.
		 *
		 * @param \Slim\Flash\Messages $flash
		 */
		public function __construct(
			\Slim\Flash\Messages $flash
		)
		{
			$this->flash = $flash;
		}

		public function __invoke(Request $request, Response $response, array $params)
		{
			try{
				echo 'Login';
				exit();

			}
			catch(StartException $e){
				throw $e;
			}
		}
	}
