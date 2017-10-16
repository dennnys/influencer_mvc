<?php 

class ControleurVue {

	public function create($fichier, $donnee) {
		$_fichier = $fichier.'.php';
		extract($donnee);
		//echo $_fichier;die();
		require_once $_fichier;
	}

}