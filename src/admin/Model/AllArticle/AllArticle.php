<?php


	/**
	* Darstellung aller Artikel
	*
	* @author Stephan Krauss
	* @copyright Stephan Krauss
	* @lisence MIT
	* @date
	*/

	namespace Admin\Model\AllArticle;

	class AllArticle
	{
		protected $categories = [];
		protected $allArticles = [];

		/**
		 * vorhandene Kategorien
		 *
		 * @param array $categories
		 */
		public function setCategories($categories)
		{
			$this->categories=$categories;

			return $this;
		}

		/**
		 * ermitteln des Inhaltes der Kategorie - Dateien
		 *
		 * @return $this
		 * @throws \Exception
		 */
		public function work(){
			try{

				$allCategorieFiles = $this->findCategorieFiles();
				$this->allArticles = $allCategorieFiles;

				return $this;
			}
			catch(Exception $e){
				throw $e;
			}
		}

		/**
		 * @return array
		 */
		public function getAllArticles()
		{
			return $this->allArticles;
		}

		/**
		 * findet die Dateien aller Kategorien
		 */
		protected function findCategorieFiles()
		{
			$allCategorieFiles = array();

			$j = 0;

			for($i=0; $i < count($this->categories); $i++){
				$singleCategoriePath=realpath(__DIR__ . '/../../../../public/categorie/' . $this->categories[$i]['link']);
				$handle=opendir($singleCategoriePath);

				while(false !== ($file=readdir($handle))){
					if(($file == ".") or ($file == '..')){
						continue;
					}

					$content = file(realpath($singleCategoriePath.'/'.$file), FILE_IGNORE_NEW_LINES);

					$allCategorieFiles[$j] = array(
						'categorie' => $this->categories[$i]['link'],
						'position' => $content[0],
						'file' => substr($file,0,-3),
						'description' => substr($content[1],2)
					);

					$j++;
				}
			}

			return $allCategorieFiles;
		}
	}
