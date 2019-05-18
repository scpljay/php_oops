<?php 
	/* 
		Example of Singleton Classes
	*/

	class Database {
		
		private $_connection; 
		private static $_instance; /* Single Instance */
		private $_host = 'localhost';
		private $_database = 'TechInterview';
		private $_username = 'root';
		private $_password = '';

		/* Magic Constants - Constructor */
		private function __construct(){
			// echo "Construct Called";
			$this->_connection = new mysqli($this->_host, $this->_username, $this-> _password, $this-> _database);

			if(mysqli_connect_error()){
				trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(), E_USER_ERROR);
			}
		}		

		/* 
			Get an instance of Database Object 
			@return Instance
		 */
		public static function getInstance(){
			// echo "Instance created ";
			if(!self::$_instance){
				self::$_instance = new self();
			} else {}
			// echo "Instance created 2";

			return self::$_instance;
			// return self::$_instance;
		}

		/* Magic method clone is empty to prevent duplication of connection */
		private  function __clone(){

		}

		/* 
			Get mysqli connection
		*/
		public function get_connection(){
			// echo "connection On";
			return $this-> _connection;
		}

		/* Close Database Connection */
		protected function __destruct() {
		    $this->_connection->close();
		    echo "Parent Destruct Called";
		}

		public function getAll($value='')
		{
			return ($this->_connection->query($value));
		}
	}

	/*
	$db = Database::getInstance();
	$mysql = $db-> get_connection();

	$qry = $mysql->query("SELECT * FROM question");
	
	while ($row = $qry->fetch_assoc()) {
		echo "<pre>";
		print_r($row);
		echo "<br/>";
	} 
	*/
	/**
	 * 

	 */
	class ExtendDb extends Database
	{
		private $db;

		function __construct()
		{
			echo "Hi How R U";
			$this->db = Database::getInstance();

		}

		public function getAllData()
		{
			$row1 = $this->db->getAll("SELECT * FROM question");
			while ($row = mysqli_fetch_assoc($row1)) {
				print_r($row);
			}
		}

		public function __destruct()
		{
			# code...
			echo "Are we calling by child";
		}
	}

	$second = new ExtendDb();

	$data = $second->getAllData();
	print_r($data);

 ?>