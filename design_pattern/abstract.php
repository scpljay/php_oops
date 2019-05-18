<?php 
	/**
	 * 
	 */
	abstract class Shape 
	{
		public $x;
		public $y;
		public $z;
		/*function __construct()
		{
			# code...
			echo "Constructor called";
		}*/

		abstract protected function Circle($c1, $c2);
		abstract public function Rectangle($r1, $r2);

		public function Traingle($X, $Y, $Z)
		{
			# code...
			$this->x = $X;
			$this->y = $Y;
			$this->z = $Z;
			echo "Print Traingle ". $this->x .'/'. $this->y .'/'. $this->z;
		}
	}

	/**
	 * 
	 */
	class ChileShape extends Shape
	{
		public $c1;
		public $c2;

		public $r1;
		public $r2;

		static function StaticFunction()
		{
			# code...
			echo "StaticFunction  Called ";
		}



		public function Circle($c1, $c2)
		{
			# code...
			$this->c1 = $c1;
			$this->c2 = $c2;

			echo "Draw Circle ". $this->c1."/".$this->c2;
		}

		public function Rectangle($c1, $c2)
		{
			# code...
			$this->r1 = $c1;
			$this->r2 = $c2;

			echo "Draw Rectangle ". $this->r1."/".$this->r2;
		}

		protected function ChildProtectedFunction($value='')
		{
			echo "This called by Extends class";
		}
	}

	
	// echo ChileShape::StaticFunction(4,5);

	/**
	 * 
	 */
	class ThirdChild extends ChileShape
	{
		public $name;
		public function TestName($value='')
		{
			$this->name = $value;
			echo "I m {$this->name} - {$this->ChildProtectedFunction()}";
		}
		
	}

	$Obj = new ChileShape();
	echo $Obj->Circle(5,6);
	echo "<br>";
	echo $Obj->Rectangle(5,6);
	echo "<br>";
	echo $Obj->Traingle(5,6,7);
	echo "<br>";
	$Obj2 = new ThirdChild();
	echo "<br>";
	echo $Obj2->TestName('jay');
	// echo "<br>";
	// echo $Obj2->Circle(4,8);
	// echo "<br>";
	/*
	Fatal error: Uncaught Error: Call to protected method ChileShape::ChildProtectedFunction() from context '' in C:\xampp\htdocs\php_oops\abstract.php:102 Stack trace: #0 {main} thrown in C:\xampp\htdocs\php_oops\abstract.php on line 102

	because access type is protected
	*/
	// echo $Obj2->ChildProtectedFunction();

 ?>