<?php 
	/**
	 * Inheritance : Description
	 * Inheritance allows us to write the code only once in the parent, and then use the code in both the 
	 * parent and the child classes.
	 * Parent Class
	 */
	 class Car
	{
		protected $model;
		function __construct()
		{
			echo "Parent Constructor";
		}

		public function SetModel($model)
		{
			$this->model = $model;
		}

		/* When we declare a property or a method as protected, we can approach it from both the parent and the child classes.
		*/
		public function getModel()
		{
		  return $this -> model;
		}

		public function SayHello($value='')
		{
			echo "How r U? Class Name :". __CLASS__;
		}

	}

	/**
	 * Child Class Inherit The Parent Class All Method & Properties
	 */
	class SportsCar extends Car
	{
		private $style = 'fast and furious';
		
		function __construct()
		{
			// echo "Child Constructor";
		}

 
	  	public function driveItWithStyle()
	  	{
	   		return 'Drive a '  . $this->model . ' <i>' . $this -> style . '</i>';
	  	}

		function __destruct()
		{
			// echo "Object destroyed";
		}

		public function SayHello($value='')
		{
			echo "<br>";
			parent::SayHello();
			echo "<br>";
			// echo $this->SayHello();
			echo "I m Fine Thank You! Class Name :". __CLASS__;
		}

	}

	$obj = new SportsCar();
	echo "<br>";
	// var_dump($obj);
	// echo "<br>";
	$obj->SetModel('SUV');
	echo "<br>";
	// var_dump($obj);
	// echo "<br>";

	echo $obj->getModel();
	echo "<br>";
	// var_dump($obj);
	// echo "<br>";
	echo $obj->driveItWithStyle();
	echo "<br>";

	$obj->SayHello('jay');
	echo "<br>";
	echo "<br>";

	echo "File Path: ". __FILE__;
	echo "<br>";
	echo "Line Number: ". __LINE__;
	echo "<br>";
	
 ?>