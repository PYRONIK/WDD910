<?php
// sportwagen erbt von pkw
class sportwagen extends pkw{

	// Methode bremsen() wird überschrieben
	public function bremsen($wert){
		echo "ich bin ein sportwagen ich bremse stärker";

		if(isset($wert)){
			if($wert > 10){

				$this->quietschen();
			}		
		}



		return $this;
	}

	

	public function licht(){
		echo "ich dreh jetzt mein supertolles xenon-licht auf - BAAAM!";
	}
}


?>
