<?php

	namespace App\Model\Category;

	/**
	 * sichtet die Markdown Files einer Kategorie
	 *
	 * @author Stephan Krauß
	 * @date 12.09.2017
	 * @file Category.php
	 */
	class Category
	{
		protected $content = null;
		protected $categoryName = null;
		protected $markdownParser = null;

		/**
		 * Übernimmt den Namen der Kategorie
		 * Category constructor.
		 *
		 * @param $categoryName
		 * @param $markdownParser
		 */
		public function __construct(
			\Parsedown $markdownParser
		)
		{
			$this->markdownParser = $markdownParser;
		}

		public function setCategoryName($categoryName)
		{
			$this->categoryName = $categoryName;

			return $this;
		}

		/**
		 * steuert die Rückgabe der Inhalte einer Kategorie
		 *
		 * @throws \Throwable
		 */
		public function work()
		{
			try{
				 $files = $this->findFiles($this->categoryName);
				 $unsortedMarkDownFiles = $this->readFileContent($this->categoryName, $this->markdownParser, $files);
				 $this->content = $this->sortFileContent($unsortedMarkDownFiles);

				return $this;
			}
			catch(\Throwable $e){
				throw $e;
			}
		}

		/**
		 * sortiert den Inhalt der Kategorie

		 *
*@param array $markDownFiles
		 *
*@return mixed
		 */
		protected function sortFileContent(array $markDownFiles)
		{
			$content = '';

			array_multisort($markDownFiles, SORT_ASC);

			foreach($markDownFiles as $markDownFile){
				$content .= "<p>";
				$content .= $markDownFile['inhalt'];

				$image = str_replace('.md', '.jpg', $markDownFile['image']);
				$image = "images/".$image;

				if(is_file($image)){
					$content .= '<a href="/'.$image.'" data-featherlight="image">';
					$content .= "<img src='/".$image."' width='75' height='75' style='float:left;' class='minibild'>";
					$content .= '</a>';
				}


				$content .= "</p>";
			}

			return $content;
		}

		/**
		 * sortiert die Markdown Files entsprechend der Makro - Information
		 *
		 * @param $categoryName
		 * @param \Parsedown $markdownParser
		 * @param $markDownFiles
		 *
		 * @return array
		 */
		protected function readFileContent($categoryName, \Parsedown $markdownParser, $markDownFiles)
		{
			$unsortedMarkDownFiles = [];

			$i = 0;
			foreach($markDownFiles as $markDownFile){
				$fileContent = file('categorie/'.$categoryName.'/'.$markDownFile);

				$unsortedMarkDownFiles[$i] = array(
					'anzeige' => array_shift($fileContent),
					'image' => $markDownFile
				);

				$text = '';
				foreach($fileContent as $content){
					$text .= $content;
				}

				$unsortedMarkDownFiles[$i]['inhalt'] = $markdownParser->text($text);

				$i++;
			}

			return $unsortedMarkDownFiles;
		}

		/**
		 * findet die Markdown Files einer Kategorie
		 * 
		 * @param $categoryName
		 *
		 * @return array
		 */
		protected function findFiles($categoryName)
		{
			$markDownFiles=[];

			$files=scandir('categorie/' . $categoryName . '/');

			$i=0;
			foreach($files as $file){
				if(($file == '.') or ($file == '..'))
					continue;

				$markDownFiles[$i]=$file;

				$i++;
			}

			return $markDownFiles;
		}

		/**
		 * @return text
		 */
		public function getCategoryContent()
		{
			return $this->content;
		}
	}
