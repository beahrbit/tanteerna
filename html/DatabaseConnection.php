<?php 
Class Database {
	private $host;
    private $username;
    private $password;
    private $db;

    public function __construct() {
		$this->host = "localhost";
        $this->username = "web26762838";
        $this->password = "mlVIPbDT";
        $this->db = "usr_web26762838_1";
    }
	
    public function connect() {
		$link = mysqli_connect($this->host, $this->username, $this->password);
		mysqli_select_db($link, $this->db);
        return $link;
    }
}
?>

<!--
	require("DatabaseConnection.php");
	$connection = new DatabaseConnection();
	$link = $connection->connect();
-->