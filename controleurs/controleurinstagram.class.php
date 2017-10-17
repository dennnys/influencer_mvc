<?php 

class ControleurInstagram {

	public function __construct() {
		require_once 'lib/unirest/src/Unirest.php';
	}

	public function execute() {
		if (Utils::getPost('infl-inp-search-ig')) {
			$urlIg = Utils::filtreFort($_POST['infl-inp-search-ig']);
			$this->report($urlIg);
		} else {
			$this->searchIn();
		}
	} // end function

	public function searchIn() {

		$param = ["limit" => 2];

		$token = '';
		if (Utils::getPost('infl-category-ig')) $param['filter[brand_category][0]'] = $_POST['infl-category-ig']; 
		if (Utils::getPost('infl-country-ig')) $param['filter[geo][0][id]'] = Utils::filtreFort($_POST['infl-country-ig']); 
		if (Utils::getPost('infl-subscr-min-ig')) $param['filter[followers][left_number]'] = Utils::filtreFort($_POST['infl-subscr-min-ig']); 
		if (Utils::getPost('ininfl-subscr-max-ig')) $param['filter[followers][right_number]'] = Utils::filtreFort($_POST['infl-subscr-max-ig']); 
		if (Utils::getPost('infl-age-min-ig')) $param['filter[age][left_number]'] = Utils::filtreFort($_POST['infl-age-min-ig']); 
		if (Utils::getPost('infl-age-max-ig')) $param['filter[age][right_number]'] = Utils::filtreFort($_POST['infl-age-max-ig']); 
		if (Utils::getPost('infl-engagement-min-ig')) $param['filter[engagements][left_number]'] = Utils::filtreFort($_POST['infl-engagement-min-ig']);
		if (Utils::getPost('infl-engagement-max-ig')) $param['filter[engagements][right_number]'] = Utils::filtreFort($_POST['infl-engagement-max-ig']); 
		$token = '';
		if (Utils::getPost('infl-token-ig')) $token = Utils::filtreFort($_POST['infl-token-ig']);


			$query_reponse_ig = Unirest\Request::post("https://deepsocialapi.com/v1/accounts/search?api_token=".$token,
			  array(
			    "Accept" => "application/json"
			  ),
			  Unirest\Request\Body::form($param)
			);

			$reponse_ig = $query_reponse_ig->body;

		$vue = new ControleurVue();
		$vue->create('resultIg', ['data'=>$reponse_ig]);
	}

	public function report($url) {

		$token = '';
		if (Utils::getPost('infl-token-ig')) $token = Utils::filtreFort($_POST['infl-token-ig']);

		$query_report_ig = Unirest\Request::post("https://deepsocialapi.com/v1/sampling_request",
		  array(
		    "Content-Type" => "application/x-www-form-urlencoded",
		    "Accept" => "application/json"
		  ),
		  Unirest\Request\Body::form(array(
		    "api_token" => $token,
		    "url" => $url
		  ))
		);
		$report_ig = $query_report_ig->body; 

		$vue = new ControleurVue();
		$vue->create('reportIg', ['data'=>$report_ig]);
	} // end function

}