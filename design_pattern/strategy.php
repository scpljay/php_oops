<?php 
	/*
	* Strategy — the power of interface
	* We consider use of the strategy pattern when we need to choose between similar classes that are different only in their implementation.
	*/
	interface carCouponGenerator {
	  function addSeasonDiscount();
	  function addStockDiscount();
	}

	/**
	 * 
	 */
	class bmwCouponGenerator implements carCouponGenerator
	{
		private $discount = 0;
		private $isHighSeason = false;
		private $bigStock  = false;
		
		public function addSeasonDiscount()
		{
			if (!$this->isHighSeason) {
				$this->discount +=35;
			} else {
				$this->discount +=10;
			}
			return $this->discount;
		}

		public function addStockDiscount()
		{
			if (!$this->bigStock) {
				$this->discount +=25;
			} else {
				$this->discount +=20;
			} 
			return $this->discount;	
		}
	}

	class audiCouponGenerator implements carCouponGenerator
	{
		private $discount = 0;
		private $isHighSeason = false;
		private $bigStock  = false;
		
		public function addSeasonDiscount()
		{
			if (!$this->isHighSeason) {
				$this->discount +=15;
			} else {
				$this->discount +=10;
			}
			return $this->discount;
		}

		public function addStockDiscount()
		{
			if (!$this->bigStock) {
				$this->discount +=5;
			} else {
				$this->discount+=10;	
			}
			return $this->discount;	
		}
	}

	/* Strategy Pattern Class */ 
	// The client class generates coupon from the object of choice.
	class couponGenerator {
	  private $carCoupon;
	  private $carObj;
	  // Get only objects that belong to the interface.  
	  public function __construct($car)
	  {
	    if($car == "bmw")
		{
			$this->carObj = new bmwCouponGenerator;
		}
		else if($car == "audi")
		{
			$this->carObj = new audiCouponGenerator;
		}

		return $this->carObj;
	  }
	   
	  // Use the object's methods to generate the coupon. 
	  public function getCoupon()
	  {
	    $discount = $this->carObj->addSeasonDiscount();
	    $discount = $this->carObj->addStockDiscount();
	    
	    return $coupon = "Get {$discount}% off the price of your new car.";
	  }
	}

	$car = "bmw";
	$obj1 = new couponGenerator($car);
	echo $obj1->getCoupon();
	echo "<hr/>";
	$car = "audi";
	$obj1 = new couponGenerator($car);
	echo $obj1->getCoupon();
	
?>