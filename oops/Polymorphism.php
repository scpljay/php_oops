<?php 
	/**
	 * Polymorphism:
	 * According to the Polymorphism principle, methods in different classes that do similar things should 
	 * have the same name.
	 * In order to implement the polymorphism principle, we can choose between abstract classes and 
	 * interfaces.
	 */
	interface Shape {
	  public function calcArea();
	}

	class Circle implements Shape
	{
		private $radius;
		
		function __construct($radius)
		{
			$this->radius = $radius;
		}

		public function calcArea()
	  	{
	    	return $this -> radius * $this -> radius * pi();
		}
	}

	class Rectangle implements Shape
	{
		private $x;
		private $y;
		
		function __construct($x, $y)
		{
			$this->x = $x;
			$this->y = $y;
		}

		public function calcArea()
	  	{
	    	return $this -> x * $this -> y;
		}
	}

	$circle = new Circle(2,4);
	echo $circle->calcArea();
	echo "<br>";
	$rectangle = new Rectangle(2,4);
	echo $rectangle->calcArea();
 ?>