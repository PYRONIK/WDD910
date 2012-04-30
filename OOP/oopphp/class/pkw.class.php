<?php

class pkw {
	// Eigenschaft farbe	
	private $farbe = 'rot';

	// __construct wird aufgerufen wenn aus pkw eine Instanz gebildet wird.
	public function __construct( $farbe ){
		// farbe wird nur gesetzt wenn sie bei der Instanzbildung übergeben wurde.
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

	// gibt die Farbe des pkw's zurück.
	public function getFarbe(){
		return $this -> farbe;
	}
}

?>
