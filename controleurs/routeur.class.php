<?php 

class Routeur {

	private $_crtlPage; 
	
	public function execute() {

		if (!isset($_GET['controleur'])) {
			$_GET['controleur'] = 'accueil';
		}

		switch ($_GET['controleur']) {
			case 'accueil':
				$this->accueil();
				break;
		}

	}

	private function accueil() {
		$_crtlPage = new ControleurAccueil();
		$_crtlPage->execute();
	}

} //end routeur