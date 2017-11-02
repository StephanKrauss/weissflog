<?php
	/**
	 * Test des Login
	 *
	 * @author User
	 * @date 02.11.2017
	 * @time 06:30
	 */

	namespace Admin\Tool;

	use Slim\Http\Request;
	use Slim\Http\Response;

	trait CheckLogin
	{
		/**
		 * kontrolliert den Login
		 *
		 * @param \Slim\Http\Request $request
		 * @param \Slim\Http\Response $response
		 * @param $loginValueCookie
		 *
		 * @return array
		 */
		protected function testLogin(Request $request, Response $response, $loginValueCookie): array
		{
			$allPostVars = [];
			$loginFlag = false;

			if($loginValueCookie != $this->loginValue){
				if($request->isPost()){
					$allPostVars=$request->getParsedBody();

					if(array_key_exists('passwort', $allPostVars)){
						if($allPostVars['passwort'] == $this->loginValue){
							$response=$this->setPasswortCookie($response);

							$loginFlag = true;
						}
					}
				}
			}
			else{
				$loginFlag = true;
			}

			return [$allPostVars, $response, $loginFlag];
		}

	}