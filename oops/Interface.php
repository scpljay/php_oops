<?php 
	
	/*
	* 	What is Inteface?
	* 	Interface includes only abstract method and programmer should implement all method strictly in Child Class
	* 	Use Implement keyword to implement Inteface
	* 	All method sholud have abstract only
	* 	very usefull for Organistion
	*	An interface commits its child classes to abstract methods that they should implement.
	*/	
	interface Users{		

		public function getContactDetails($userId);
		public function getPointDetails($userId);
		public function lastOrder($userId);
	}

	/**
	 * 
	 */
	class User implements Users
	{
		protected $userId;
		
		public function getContactDetails($userId='')
		{
			if(!is_int($userId)){
				echo "getContactDetails string userId is ".$this->userId = $userId;
			}else{
				echo "getContactDetails userId is ".$this->userId = $userId;
			}
		}
		public function getPointDetails($userId='')
		{
			echo "getPointDetails userId is ".$this->userId = $userId;
		}
		public function lastOrder($userId='')
		{
			echo "lastOrder userId is ".$this->userId = $userId;
		}

		public function CheckUser($name, $age, $email, $mobile)
		{	
			echo "<br/>";
			return "My Name is ". $this->name = $name . " & Age is ". $this->age = $age;
		}
	}

	$u = new User();
	$s = $u -> getContactDetails(123);
	$s = $u -> CheckUser("Ajay", 45, "scpl@gmail.com", "9874563210");
	var_dump($s);
	// echo $s;

 ?>