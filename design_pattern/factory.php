<?php 
	/*
		the factory pattern instructs us to separate the making of objects into a factory class while leaving the main part of the app to handle the management of the objects.
	*/
	/* Making object in seprate classes */
	class CarFactory {
 
	  protected $car;
	  
	  // Determine which model to manufacture, and instantiate 
	  //  the concrete classes that make each model.
	  public function make($model=null)
	  {
	    if(strtolower($model) == 'r')
	      return $this->car = new CarModelR();
	  
	    return $this->car = new CarModelS();
	  }
	}
	/* Call the factory classes for creating dynamic object */
	class CarOrder {
	  protected $carOrders = array();
	  protected $car;
	  
	  // First, create the carFactory object in the constructor.
	  public function __construct()
	  {
	    $this->car = new CarFactory();
	  }
	  
	  public function order($model=null)
	  {
	    // Use the make() method from the carFactory.
	    $car = $this->car->make($model);
	    $this->carOrders[]=$car->getModel();
	  }
	  
	  public function getCarOrders()
	  {
	    return $this->carOrders;
	  }
	}

	/*
		But what about the actual classes that make the car objects? For this purpose, we use a Car interface, and implement it with concrete classes that make the r and s models. Let's start with the interface which tells us what features all the car objects need to have:
	*/

	interface Car {
	  function getModel();
	  
	  function getWheel();
	  
	  function hasSunRoof();
	}

	/*
	Once we have an interface, we can write the concrete classes CarModelR and CarModelS that implement the interface.
	*/

	class CarModelS implements Car {
	  protected $model = 's';
	  protected $wheel = 'sports';
	  protected $sunRoof = true;
	  
	  public function getModel()
	  {
	    return $this->model;
	  }
	  
	  public function getWheel()
	  {
	    return $this->wheel;
	  }
	  
	  public function hasSunRoof()
	  {
	    return $this->sunRoof;
	  }
	}

	class CarModelR implements Car {
	  protected $model = 'r';
	  protected $wheel = 'regular';
	  protected $sunRoof = false;
	  
	  public function getModel()
	  {
	    return $this->model;
	  }
	  
	  public function getWheel()
	  {
	    return $this->wheel;
	  }
	  
	  public function hasSunRoof()
	  {
	    return $this->sunRoof;
	  }
	}

	$carOrder = new CarOrder;
	var_dump($carOrder->getCarOrders());
	
	/* CarModelR */
	$carOrder->order('r');
	var_dump($carOrder->getCarOrders());
	/* CarModelS*/
	$carOrder->order('s');
	var_dump($carOrder->getCarOrders());

 ?>
 ?>