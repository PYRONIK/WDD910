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

			$this->_setUsername($_SESSION['username'],$_SESSION['password'], false);
			return $this->_checkUser();
		
		}else{
			$this->_setUsername(false,false,false);
		}
	}

	public function login($username, $password){
		$this->_setUsername($username, $password, false);
		$this->_checkUser();
			
	}

	private function _checkUser(){


		echo "<h1>CHECKUSER</h1>";
		var_dump($this);

	
	}

	private function _setUsername($username, $password, $group){

		$_SESSION['username'] = $this->_username = $username;
		$_SESSION['password'] = $this->_password = $password;
		$_SESSION['group'] = $this->_group = $group;
	}

	public function logout(){
		$this->_setUsername(false,false,false);
	}

	public function getUsername(){
		return $this->_username;
	}

	public function getUserGroup(){
		return $this->_group;
	}


}

?>
