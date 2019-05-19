<?php 
	/*
	### Facade Pattern ###
	* How to simplify a PHP code with the help of the façade pattern?
	* We need to consider the use of the façade pattern in those cases that the code that we want to use consists of too many classes and methods, and all we want is a simple interface, preferably one method, that can do all the job for us.
	* The problem: complicated code with too many classes and methods
	* A real life example can be a code that shares the newest posts in our blog with several social networks. Each social network has its own class, and a set of methods to share our posts.
	*
	*
	*/

	/**
	 * 
	 */
	class Facebook 
	{
		
		function postToWall($post)
		{
			return 'Facebook - '.$post;
		}
	}

	class Twitter 
	{
		
		function poetTweet($post)
		{
			return 'Twitter - '.$post;
		}
	}

	class Google 
	{
		
		function postToPlus($post)
		{
			return 'Google Plus - '.$post;
		}
	}

	/*
	* 3 Social sites which is share same thing, We want to manage from one class, that we should use facade pattern
	* A façade class enables us to call only one method instead of calling to many methods. By doing so, it simplifies the work with the system, and allows us to have a simpler and more convenient interface.
	* Facade Class 
	* It holds references to the classes that it uses (in our case, to the Facebook, Google, and the  Twitter classes).
	* It has a method that calls all of the methods that we need.
	*/

	/**
	 * 
	 */
	class SharePost
	{
		protected $twitter;    
  		protected $google;   
  		protected $facebook;  

		function __construct($facebook, $google, $twitter)
		{
			$this->facebook = $facebook;
			$this->google = $google;
			$this->twitter = $twitter;
		}

		public function Post($post)
		{
			return $this->facebook->postToWall($post).', '. $this->google->postToPlus($post).', '.$this->twitter->poetTweet($post);
		}
	}

	$share = new SharePost(new Facebook(),new Google(),new Twitter());
	$post = "This is a Social Post";
	echo $sharePost = $share->Post($post);



 ?>