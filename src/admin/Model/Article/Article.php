<?php

	namespace Admin\Model\Article;

	use Admin\Controller\Dashboard\DashboardException;
	use App\Controller\Start\StartException;

	/**
	 * Anlegen eines neuen Artikel
	 *
	 * @author Stephan Krauss
	 * @date 12.09.2017
	 * @file Article.php
	 */
	class Article
	{
		protected $ueberschrift = null;
		protected $kurzbeschreibung = null;
		protected $text = null;
		protected $bild = null;
		protected $time = null;
		protected $category = null;
		protected $position = 1;

		/**
		 * Übernimmt den Uploader
		 *
		 * Article constructor.
		 *
		 * @param $modelUploader
		 */
		public function __construct()
		{

		}

		/**
		 * @param null $ueberschrift
		 *
		 * @return Article
		 */
		public function setUeberschrift($ueberschrift)
		{
			$this->ueberschrift=$ueberschrift;

			return $this;
		}

		/**
		 * @param null $kurzbeschreibung
		 *
		 * @return Article
		 */
		public function setKurzbeschreibung($kurzbeschreibung)
		{
			$this->kurzbeschreibung=$kurzbeschreibung;

			return $this;
		}

		/**
		 * @param null $text
		 *
		 * @return Article
		 */
		public function setText($text)
		{
			$this->text=$text;

			return $this;
		}

		/**
		 * @param $time
		 *
		 * @return $this
		 */
		public function setTime($time)
		{
			$this->time = $time;

			return $this;
		}

		/**
		 * @param $position
		 *
		 * @return $this
		 */
		public function setPosition($position)
		{
			$this->position = $position;

			return $this;
		}

		/**
		 * @param $category
		 *
		 * @return $this
		 */
		public function setCategory($category)
		{
			$this->category = $category;

			return $this;
		}

		/**
		 * @param null $bild
		 *
		 * @return Article
		 */
		public function setBild($bild)
		{
			$this->bild=$bild;

			return $this;
		}

		/**
		 * steuert das anlegen des neuen Artikel
		 *
		 * @throws \Throwable
		 */
		public function work()
		{
			try{
				$this->validate($this->ueberschrift, $this->kurzbeschreibung, $this->text);
				$control = $this->createMdFile($this->time, $this->category);

				if(!$control)
					throw new DashboardException('Markdown file not geneate', 3);
			}
			catch(\Throwable $e){
				throw $e;
			}
		}

		/**
		 * schreibt die MD - Datei
		 *
		 * @param $time
		 * @param $category
		 *
		 * @return int
		 */
		protected function createMdFile($time, $category)
		{
			$content = $this->position."\n";
			$content .= '###'.$this->ueberschrift."\n";
			$content .= $this->kurzbeschreibung."\n";
			$content .= $this->text;

			$fp = fopen('categorie/'.$category.'/'.$time.'.md', 'w');
			$control = fputs($fp, $content);
			fclose($fp);

			return $control;
		}

		/**
		 * kontrolliert die Pflichtangaben
		 *
		 * @param $ueberschrift
		 * @param $kurzbeschreibung
		 * @param $text
		 *
		 * @throws \App\Controller\Start\StartException
		 */
		protected function validate($ueberschrift, $kurzbeschreibung, $text)
		{
			if( (is_null($ueberschrift)) or (is_null($kurzbeschreibung)) or (is_null($text)) )
				throw new StartException('Pflichtangaben fehlen', 3);

			return;
		}

	}
