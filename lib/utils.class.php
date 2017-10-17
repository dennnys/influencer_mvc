<?php 

/**
 * Classe avec des fonctions statique utilitaires qui aident dans la programmation
 */
class Utils {

	/**
	 * Vérifiant s'il y a la variable $_POST['value']
	 * @param string $value
	 * @return si existe - la valeur de la variable $_POST[$value]
	 * @return s'il n'existe pas - boolean FALSE
	 */
	static function getPost($value) {
		if (isset($_POST[$value])) {
			if($_POST[$value] != '') {
				return $_POST[$value];
			} else {
				return false;
			}
		} else { return false; }
	}

	/**
	 * Vérifiant s'il y a la variable $_GET['value']
	 * @param string $value
	 * @return si existe - la valeur de la variable $_GET[$value]
	 * @return s'il n'existe pas - boolean FALSE
	 */
	static function getGet($value) {
		if (isset($_GET[$value])) {
			if($_GET[$value] != '') {
				return $_GET[$value];
			} else {
				return false;
			}
			
		} else { return false; }
	}

	/**
	 * Vérifiant s'il y a la variable $_SESSION['value']
	 * @param string $value
	 * @return si existe - la valeur de la variable $_SESSION[$value]
	 * @return s'il n'existe pas - boolean FALSE
	 */
	static function getSession($value) {
		if (isset($_SESSION[$value])) {
			return $_SESSION[$value];
		} else { return false; }
	}

	/**
	 * Fonction qui supprime toutes les étiquettes
	 * @param string $str
	 * @return string $str
	 */
	static function filtreFort($str) {
		$str = trim($str);
		$str = strip_tags($str);
		//$str = mysqli_real_escape_string(SingletonPDO::getInstance(), $str);
		return $str;
	}

	static function procent($val){
		$val = floatval($val);
		$val = $val * 100;
		$val = round($val, 0, PHP_ROUND_HALF_UP);
		return $val;
	}

}


