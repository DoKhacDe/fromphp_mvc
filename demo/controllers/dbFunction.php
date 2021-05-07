<?php
include_once('../models/dbConnect.php');


session_start();
 	class dbFunction {
		private $db;
		function __construct() {
			
			// connecting to database
			$dbCon = new dbConnect();
			$this->db = $dbCon->connect();
		}
		// destructor
		function __destruct() {
			
		}
		public function UserRegister($username, $emailid, $password){
			 	//$password = $password;
				$username = trim(mysqli_real_escape_string($this->db,preg_replace('/([^A-Za-z0-9]+\s+)/',' ', htmlentities($_POST['username']))));
				$emailid =  mysqli_real_escape_string($this->db,$_POST['emailid']);
				$password =  mysqli_real_escape_string($this->db,$_POST['password']);
				$password = md5($password);
				
				$qr = mysqli_query($this->db,"INSERT INTO user(username, emailid, password) values('".$username."','".$emailid."','".$password."')") or die(mysql_error());
				return $qr;
			 
		}
		public function Login($emailid, $password){
			$emailid =  mysqli_real_escape_string($this->db,$_POST['emailid']);
			$password =  mysqli_real_escape_string($this->db,$_POST['password']);
			$password = md5($password);

			$res =mysqli_query($this->db,"SELECT * FROM user WHERE emailid = '".$emailid."' AND password = '".$password."'") or die();
			$user_data = mysqli_fetch_array($res);
			//print_r($user_data);
			$no_rows = mysqli_num_rows($res);
			
			if ($no_rows == 1) 
			{
				$_SESSION['login'] = true;
				$_SESSION['uid'] = $user_data['id'];
				$_SESSION['username'] = $user_data['username'];
				$_SESSION['email'] = $user_data['emailid'];
				return TRUE;
			}
			else
			{
				return FALSE;
			}
			 
				 
		}
		public function isUserExist($emailid){
			$qr = mysqli_query($this->db,"SELECT * FROM user WHERE emailid = '".$emailid."'");
			 $row = mysqli_num_rows($qr);
			if($row > 0){
				return true;
			} else {
				return false;
			}
		}
		public function ListUser($username,$emailid,$password){
			$username = $_POST['username'];
                $emailid = $_POST['emailid'];
                $password = $_POST['password'];
			$sql = mysqli_query($this->db,"SELECT * FROM user ");
		}
	
	}
?>