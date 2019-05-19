<?php 
  // Singleton class 
  // We use the singleton pattern in order to restrict the number of instances that can be created from a resource consuming class to only one.
  // Resource consuming classes are classes that might slow down our website or cost money
  // Since we restrict the number of objects that can be created from a class to only one, we end up with all the variables pointing to the same, single object.
  // Singleton to connect db.
  class ConnectDb {
    // Hold the class instance.
    private static $instance = null;
    private $conn;
    
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'TechInterview';
     
    // The db connection is established in the private constructor.
    private function __construct()
    {
      $this->conn = new PDO("mysql:host={$this->host};
      dbname={$this->name}", $this->user,$this->pass,
      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }
    
    public static function getInstance()
    {
      if(!self::$instance)
      {
        self::$instance = new ConnectDb();
      }
     
      return self::$instance;
    }
    
    public function getConnection()
    {
      return $this->conn;
    }
  }
  $object = ConnectDb::getInstance();
  $con = $object->getConnection();
  // var_dump($con)
?>