<?php

	class dbConnect {
		
		// function __construct() {
			
			
		// 	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE);
		// 	//mysqli_select_db(DB_DATABSE, $conn);
		// 	var_dump('add');
		// 	if(!$conn)// testing the connection
		// 	{
		// 		die ("Cannot connect to the database");
		// 	} 
		// 	return $conn;
		// }
		public function connect(){
            require_once('../models/config.php');
            $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE); 
           if(!$conn)// testing the connection
			{
				die ("Cannot connect to the database");
			} 
			return $conn;
        }
		public function Close(){
			mysqli_close();
		}
	}
?>