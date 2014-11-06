<?php
    // These variables define the connection information for your MySQL database 
class VPDB extends mysqli {


    // single instance of self shared among all instances
    private static $instance = null;


    // db connection config vars
    private $user = "f13g10";
    private $pass = "teamten123";
    private $dbName = "student_f13g10";
    private $dbHost = "sfsuswe.com";
    
    //This method must be static, and must return an instance of the object if the object
 //does not already exist.
    public static function getInstance() {
       if (!self::$instance instanceof self) {
         self::$instance = new self;
     }
     return self::$instance;
 }

 // The clone and wakeup methods prevents external instantiation of copies of the Singleton class,
 // thus eliminating the possibility of duplicate objects.
 public function __clone() {
   trigger_error('Clone is not allowed.', E_USER_ERROR);
}
public function __wakeup() {
   trigger_error('Deserializing is not allowed.', E_USER_ERROR);
}
 // private constructor
private function __construct() {
    parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
    if (mysqli_connect_error()) {
        exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    }
    parent::set_charset('utf-8');
}
public function verify_credentials ($username, $password){
   $username = $this->real_escape_string($username);

   $password = $this->real_escape_string($password);
   $result = $this->query("SELECT 1 FROM users
       WHERE username = '" . $username . "' AND password = '" . $password . "'");
   return $result->data_seek(0);
}

public function create_user ($username, $password){
    $username = $this->real_escape_string($username);
    $password = $this->real_escape_string($password);
    $this->query("INSERT INTO users (username, password) VALUES ('" . $username . "', '" . $password . "')");
}

public function get_id_by_username($username) {

    $username = $this->real_escape_string($username);

    $temp = $this->query("SELECT id FROM users WHERE username = '"

            . $username . "'");
    if ($temp->num_rows > 0){
        $row = $temp->fetch_row();
        return $row[0];
    } else
        return null;
}

}
?>