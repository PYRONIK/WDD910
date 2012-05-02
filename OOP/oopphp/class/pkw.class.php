<?php

abstract class pkw implements tuev {
	// Eigenschaft farbe	
	private $farbe = 'rot';

	// __construct wird aufgerufen wenn aus pkw eine Instanz gebildet wird.
	public function __construct( $farbe ){
		// farbe wird nur gesetzt wenn sie bei der Instanzbildung übergeben wurde.
		if(isset($farbe)){
			$this -> farbe = $farbe;
		}
	 
	}

	// hupen() ist final und darf von erbenden Klassen (z.b. Sportwagen)
	// nicht überschrieben werden.
	final public function hupen($lautstaerke, $hupton){
	
	}


	// quietschen() darf auch innerhalb erbenden Klassen aufgerufen werden jedoch nicht von ausserhalb.
	protected function quietschen(){
	
	 echo "iiiiiiiiiiiii";
	}

	// abstract public function licht();


	public function bremsen($wert){
		echo "ich bremse";
		return $this;
	}

	final public function lenken(){
		echo "ich lenke";
		return $this;
	}

	// gibt die Farbe des pkw's zurück.
	public function getFarbe(){
		return $this -> farbe;
	}
}

?>
