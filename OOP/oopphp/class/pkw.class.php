<?php

abstract class pkw {
	// Eigenschaft farbe	
	private $farbe = 'rot';

	// __construct wird aufgerufen wenn aus pkw eine Instanz gebildet wird.
	public function __construct( $farbe ){
		// farbe wird nur gesetzt wenn sie bei der Instanzbildung übergeben wurde.
		if(isset($farbe)){
			$this -> farbe = $farbe;
		}
	 
	}

	protected function quietschen(){
	
	 echo "iiiiiiiiiiiii";
	}

	abstract public function licht();

	public function bremsen($wert){
		echo "ich bremse";
		return $this;
	}

	public function lenken(){
		echo "ich lenke";
		return $this;
	}

	// gibt die Farbe des pkw's zurück.
	public function getFarbe(){
		return $this -> farbe;
	}
}

?>
