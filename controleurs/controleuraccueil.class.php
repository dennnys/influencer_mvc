<?php 

class ControleurAccueil {

	public function execute() {

		if (!isset($_SESSION['infl-user'])) {

			if (isset($_POST['infl-btn-login'])) {
				$this->login();
			}
			$data = [];
			$vue = new ControleurVue();
			$vue->create('login', ['data'=>$data]);

		} else {
			if(isset($_POST['btn-yt-search'])) {
				// contoleur youtube
			} elseif (isset($_POST['btn-ig-search'])) {
				
				$ctrl = new ControleurInstagram();
				$ctrl->execute();
			} else {
				$data = [];
				$vue = new ControleurVue();
				$vue->create('ytig', ['data'=>$data]);
			}
		}
	} // end function

	private function login() {
		$_login = Utils::getPost('infl-login');
		$_pass = Utils::getPost('infl-pass');
		$_login = Utils::filtreFort($_login);
		$_pass = Utils::filtreFort($_pass);

		if($_login !== false && $_pass !== false) {
			$modele = new ModeleUserWP;
			$result = $modele->existeLogin($_login, $_pass);
			if(!empty($result)) {
				$_SESSION['infl-user'] = $result[0]['display_name'];
				header("Location: ".PATH);
			} else {
				$_SESSION['erreur'] = 'ERROR: Login or password is incorect!';
			}
		}


	} //end function
	
} // end class