package  {
	import flash.display.Sprite;
	
	public class main extends Sprite {

		public function main() {
			trace("Main-Klasse initialisiert");
			
			var mario:player = new player("Mario");
				// Neuen Player instantiieren mit Namen "Mario"
			addChild(mario);
				// Player der stage-displaylist hinzufügen
			mario.x = 0;
			mario.y = stage.stageHeight-151;
				// Position
			mario.steuerung("r", "t");
				// (links-taste, rechts-taste)
			
			
			var luigi:player = new player("Luigi");
			addChild(luigi);
			luigi.x = stage.stageWidth-132;
			luigi.y = stage.stageHeight-171;
			luigi.steuerung("y","x");
			
		}

	}
	
}
