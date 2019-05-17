<?php 
	/* 
		What is Adapter Pattern?
		Ans: To protect to Client data & method to change any in vendor class 
		Like Google, facebook & Twitter API (Same work group )
		Or 
		Paypal , Paytm & payu API (Same work group )

		The adapter pattern suggests that we solve the incompatibility problem by translating the new class interface to the old class interface.

		1) The adapter class needs to implement the interface of the original class.
		2) The adapter class needs to hold a reference to the new class.

	*/
	
	/* Suppose this is Facebook Wall Post API */
	class Facebook
	{

		/* 
		Any Time facebook can change this function from "postToWall" to "postingToWall", So you have to change in all your source code where you are using this, So preventing this type of Situation , You should create Adapter Class
		 */
		public function postToWall($msg)
		{
			echo $msg." - Posting to Wall";
		}
	}

	/* best way to create adapter class use interface*/
	interface SocialMedia{
		public function post($msg);
	}

	/**
	 * Adapter class for Facebook Library
	 */
	class FacebookAdapter implements SocialMedia
	{
		private $facebook;
		
		public function __construct(){
			$this->facebook = new Facebook();			
		}

		public function post($msg)
		{
			$this->facebook->postToWall($msg);
		}
	}



	$fb = new FacebookAdapter();
	/* 
	This is work everyehere , No matter, if facebook Changes his API, You have to Only Change in Adapte Class
	*/
	$fb->post("Hello World!!");
 ?>