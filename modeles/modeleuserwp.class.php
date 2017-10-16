<?php 

class ModeleUserWP {

	public function existeLogin($login, $pass) {
		$db = SingletonPDO::getInstance();
		$pass = md5($pass);

		$query = $db->prepare("SELECT display_name FROM wrdprss_users WHERE user_login = ? AND user_pass = ?");
		$query->execute([$login, $pass]);
		//var_dump($query); die();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

}