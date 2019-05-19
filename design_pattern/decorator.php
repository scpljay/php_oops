<?php 
	/*
		### Decorator Pattern ####
		We use the Decorator Pattern to add new optional feature to our code without changing of Existing Class. The new feature are added by creating new classes that belong the same type as the existing class.

		When we want to add optional feature to our code we use Decorator pattern. Which instruct us to add the basic classes that implement the interface, An abstract classes also implement same interface. The abstract classes used as super class that the feature class inherit from.

		Example:   In the example given below, an auto manufacturing company uses an interface to dictate to all of the implementing classes that they need to have price and description methods.
	*/
	interface Car{
		/* get Cost of Car */
		function cost();
		/* get description of Car */
		function description();

	}

	/**
	 * The company manufactures different types of cars, including: compact, sedan, SUV and luxury.
	 * That's how the interface is implemented for the SUV type:
	 */
	class Suv implements Car
	{
		
		public function cost()
		{
			return 5000;
		}

		public function description()
		{
			return "SUV car ";
		}
	}

	/*
	* Same way compact implemented 
	*/

	class Compact implements Car
	{
		
		public function cost()
		{
			return 3000;
		}

		public function description()
		{
			return "compact car ";
		}
	}

	/*
	* Problem:  
	* Above is all fine but the problem starts when customer given optional feature like High End Wheels * or Sun Roof, Leathr Seat. We wouldn't want to change in existing class so we have better solution 
	* for this "Decorator Class"
	* The decorator pattern thus has the following structure:
	* 1: An Abstract class which implement the interface
	* 2: SubClass that inherit the decorator class
	*/
	/**
	 * The Decorator Class
	 */
	abstract class CarFeatures implements Car
	{
		protected $car;
		function __construct(car $car)
		{
			$this->car = $car;
		}

		abstract function cost();
		abstract function description();
	}

	/**
	 * Implement Optional feature Sun Roof
	 */
	class SunRoof extends CarFeatures
	{
		function cost(){
			return $this->car->cost() + 1500;
		}

		function description(){
			return $this->car->description().", With SunRoof" ;
		}
		
	}

	/**
	 * 
	 */
	class HighEndWheels extends CarFeatures
	{
		function cost(){
			return $this->car->cost() + 1500;	
		}

		function description(){
			return $this->car->description().", With HighEndWheels" ;
		}
	}

	/*
	* Let's test the code
	* In order to implement the code, we need to:

	* First, create an object from one of the basic classes (in our example, it is the Suv class).
	* Pass the object that was created from the basic class as a parameter to the class that adds the * first feature (i.e., the SunRoof class).
	* Pass the object that was created from the first feature class to the second feature class, and so on until we finish adding all the optional features.
	* Run the methods on the last object that we created in the process of decoration.
	*/
	//1: Create an object from one of the basic classes.
	$basicCar = new Suv();
	// 2: Pass the object from the basic class as a parameter to the first feature class.
	$carWithSunRoof = new SunRoof($basicCar);

	echo $carWithSunRoof->cost()." Cost";
	echo "<br/>";
	echo $carWithSunRoof->description();

	// 3: Need more feature, Pass the object from the first feature class as a parameter to the second feature class.

	$carWithSunRoofAndHighEndWheels = new HighEndWheels($carWithSunRoof);
	// 4. Run the methods on the last object that was created.
	echo "<br/>";
	echo $carWithSunRoofAndHighEndWheels->cost()." Cost";
	echo "<br/>";
	echo $carWithSunRoofAndHighEndWheels->description();

 ?>