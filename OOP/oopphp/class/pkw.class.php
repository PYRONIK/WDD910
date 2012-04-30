<?php

class pkw {
	
	private $farbe = 'rot';

	public function __construct( $farbe ){

		if(isset($farbe)){
			$this -> farbe = $farbe;
		}
	 
	}

	public function bremsen(){
		echo "ich bremse";
	}

	public function lenken(){
		echo "ich lenke";
	}

	public function getFarbe(){
		return $this -> farbe;
	}
}

?>
