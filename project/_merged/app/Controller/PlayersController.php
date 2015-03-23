<?php
	
	class PlayersController extends AppController {
		
		public function index(){
			$this->set('players', $this->Player->find('all'));
		}
		
		public function import(){
			$this->set('message', "ICI IRA L'IMPORT DES JOUEURS.");


			$ch = curl_init();
			$source = "http://sttv.galactus.ch/dwnldfile/liz_Sttv.zip";
			curl_setopt($ch, CURLOPT_URL, $source);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$data = curl_exec ($ch);
			curl_close ($ch);
			
			$destination = "../tmp/upload/players.zip";
			$file = fopen($destination, "w+");
			if(fputs($file, $data)) echo "OK";
			else echo "NON OK!";
			fclose($file);
			
			
		}
		
		
	}
	
?>