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
		$discount = 0;
		$isHighSeason = false;
		$bigStock  = true;
		
		public function addSeasonDiscount()
		{
			if (!$this->isHighSeason) {
				$this->discount +=5;
			} else {
				$this->discount +=0;
			}
			return $this->discount;
		}

		public function addStockDiscount()
		{
			if (!$this->bigStock) {
				$this->discount +=5;
			} 
			return $this->discount+=0;	
		}
	}

	class audiCouponGenerator implements carCouponGenerator
	{
		$discount = 0;
		$isHighSeason = false;
		$bigStock  = true;
		
		public function addSeasonDiscount()
		{
			if (!$this->isHighSeason) {
				$this->discount +=15;
			} else {
				$this->discount +=0;
			}
			return $this->discount;
		}

		public function addStockDiscount()
		{
			if (!$this->bigStock) {
				$this->discount +=5;
			} 
			return $this->discount+=0;	
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
		else if($car == "mercedes")
		{
			$this->carObj = new mercedesCouponGenerator;
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
?>