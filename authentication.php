<?php

include_once 'SamDatabase.php';

Class Authentication {
	public $db = null;
	public $username = null;
	public $password = null;

	function __construct($u,$p) {
		//$this->username = mysqli_real_escape_string($this->db->connection,$u); //sanitize the inputs to avoid SQL injections
		$this->username = $u;
		//$this->password = mysqli_real_escape_string($this->db->connection,$p);
		$this->password = $p;
		$this->db = new Database();
	}

	function login() {

		//print_r($this->conn);
		$password = md5($this->password);
		$query = "SELECT * from profile where username='$this->username' AND password='$password'";
//echo $query;

		$mysqliQueryObj = mysqli_query($this->db->connection, $query);

		 //if(mysqli_error()) {
		//	die;
		// }
		if(mysqli_error($this->db->connection)) {
			die(mysqli_error($this->db->connection));
		}

		if(mysqli_num_rows($mysqliQueryObj) > 0) {
			return true; //when the return value is true, then othing will be returned after that
		}
		return false;
	}

	function logout($param) {

	}
}
?>
