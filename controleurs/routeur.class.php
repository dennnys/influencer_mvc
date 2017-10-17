<?php 

class Routeur {



	private $_crtlPage; 
	
	public function execute() {
/*
		echo "<pre>";
		var_dump($_SERVER); die();
		echo "</pre>";
*/
		if (!isset($_GET['controleur'])) {
			$_GET['controleur'] = 'accueil';
		}

		switch ($_GET['controleur']) {
			case 'accueil':
				$this->accueil();
				break;
			case 'reportig':
				$this->reportIg();
				break;

			default:
				$this->accueil();
				break;
		}

	}

	private function accueil() {
		$_crtlPage = new ControleurAccueil();
		$_crtlPage->execute();
	}

	private function reportIg() {
		if(Utils::getSession('infl-user')) {
			$id = Utils::getGet('id');
			if($id) {
				$id = Utils::filtreFort($id);
				$ctrlIg = new ControleurInstagram;
				$ctrlIg->report($id);
			} else {
				header("Location: ".PATH);
			}
		}
	}

} //end routeur