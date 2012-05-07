<?php

class user{
	
	private $_username;
	private $_password;

	private $_group;

	private $_dbConnection;

	public function __construct(){
		// login
		if( isset($_POST['username']) && isset($_POST['password']) ){
			return $this->login($_POST['username'], $_POST['password']); 
		}

		// logout
		if( isset($_GET['logout']) ){
			return $this->logout();
		}


		if( isset( $_SESSION['username'] ) && isset( $_SESSION['password'] ) && isset( $_SESSION['group'] )){
		
		}else{
			$this->_setUsername(false,false,false);
		}
	}

	public function login($username, $password){
		echo $username . $password;
	}

	private function _checkUser(){
	
	}

	private function _setUsername($username, $password, $group){
	
	}

	public function logout(){}

	public function getUsername(){}
	public function getUserGroup(){}


}

?>
