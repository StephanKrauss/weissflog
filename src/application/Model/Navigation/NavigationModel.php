<?php

	namespace App\Model\Navigation;

	/**
	 * Model zur Erstellung der Navigation
	 *
	 * @author Stephan Krauss
	 * @date 05.09.2017
	 * @file NavigationModel.php
	 * @package App\Model\Navigation
	 */
	class NavigationModel
	{
		protected $navigation = array(
			array(
				'link' => 'aaa',
				'description' => 'AAA'
			),
			array(
				'link' => 'bbb',
				'description' => 'BBB'
			)
		);

		/**
		 * Tu irgend etwas
		 *
		 * @return $this
		 * @throws \Throwable
		 */
		public function work()
		{
			try{

				return $this;
			}
			catch(\Throwable $e){
				throw $e;
			}
		}

		/**
		 * @return array
		 */
		public function getNavigation()
		{
			return $this->navigation;
		}
	}
