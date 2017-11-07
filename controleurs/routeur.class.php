<?php 

		require_once 'lib/dompdf/autoload.inc.php';
		use Dompdf\Dompdf;

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
			case 'pdfresultig':
				$this->pdfresultig();
				break;

			default:
				$this->accueil();
				break;
		}

	}

	private function accueil() {
		//var_dump(md5('denis123'));die();
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

	private function pdfresultig() {

		$dompdf = new Dompdf();
		ob_start();
		include_once 'pdf_template/ig_result.php';
		$temp = ob_get_clean();
		$dompdf->loadHtml($temp);
		//echo ($temp); die();

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'portrait');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream("instagram");

	}

} //end routeur