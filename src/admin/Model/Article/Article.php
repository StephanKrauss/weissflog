<?php

	namespace Admin\Model\Article;

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
		protected $modelUpload = null;

		protected $ueberschrift = null;
		protected $kurzbeschreibung = null;
		protected $text = null;
		protected $bild = null;

		/**
		 * Übernimmt den Uploader
		 *
		 * Article constructor.
		 *
		 * @param $modelUploader
		 */
		public function __construct(
			$modelUploader
		)
		{
			$this->modelUpload = $modelUploader;
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

			}
			catch(\Throwable $e){
				throw $e;
			}
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
