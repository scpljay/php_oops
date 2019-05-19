<?php 
	/**
	 * Template Pattern base Abstract Class 
	 * 
	 */
	abstract class generateBook {
		protected $title;
		protected $content;

		public function Title($title='')
		{
			return $this->title = $title;
		}

		public function Content($content='')
		{
			return $this->content = $content;
		}

		abstract function PrintBook();

	}
	/* Inhert the Abstract Class */
	class Paperback extends generateBook
	{
		
		public function PrintBook()
		{
			echo "Printing Book, Title <b>". $this->title."</b> and Content is <p>". $this->content."</p>";
		}
	}
	/* Inhert the Abstract Class */
	class eBook extends generateBook
	{			
		public function PrintBook()
		{
				echo "Printing eBook, Title <b>". $this->title."</b> and Content is <p>". $this->content."</p>";
		}
	}

	/*	Print Paper Book */
	$paperBook = new Paperback();
	$paperBookTitle = $paperBook->Title("The Avenger End Game");
	$paperBookContent = $paperBook->Content("The Avenger End Game ..... Bla bla bala ");
	$paperBook->PrintBook();

	/*	Print eBook */
	$epaperBook = new eBook();
	$epaperBookTitle = $epaperBook->Title("E-The Avenger End Game");
	$epaperBookContent = $epaperBook->Content("E-The Avenger End Game ..... Bla bla bala ");
	$epaperBook->PrintBook()
 ?>