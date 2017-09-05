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
		protected $seitenName = null;

		protected $statischeSeiten = [];

		public function setNavigation($seitenName)
		{
			$this->seitenName = $seitenName;

			return $this;
		}


	}
