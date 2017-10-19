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

		$param = ["limit" => 4];

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

/*
			$query_reponse_ig = Unirest\Request::post("https://deepsocialapi.com/v1/accounts/search?api_token=".$token,
				array(
					"Accept" => "application/json"
				),
				Unirest\Request\Body::form($param)
			);

			$reponse_ig = $query_reponse_ig->body;
*/


	$reponse_ig = (object) (array(
   'quota_remaining' => 20,
   'total' => 157,
   'accounts' => 
  array (
    0 => 
    (object) (array(
       'socialId' => '354945278',
       'name' => 'nilmoretto',
       'link' => 'https://instagram.com/nilmoretto',
       'fullname' => 'Nil Moretto',
       'followers' => 766884,
       'picture' => 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/10549914_1701958446686938_1569534331_a.jpg',
       'engagements' => 32247,
       'geoLocation' => 
      array (
        0 => 
        (object) (array(
           'id' => 1428125,
           'title' => 'Canada',
           'type' => 'country',
        )),
      ),
       'brandCategories' => 
      array (
        0 => 
        (object) (array(
           'id' => 1,
           'title' => 'Television & Film',
        )),
      ),
       'ages' => '25-34',
    )),
    1 => 
    (object) (array(
       'socialId' => '354046995',
       'name' => 'collinjoseph_fit',
       'link' => 'https://instagram.com/collinjoseph_fit',
       'fullname' => '#1 Most Interactive Fit Acc.',
       'followers' => 760778,
       'picture' => 'https://scontent-frx5-1.cdninstagram.com/t51.2885-19/s150x150/15306568_212149095897068_2749313814343188480_a.jpg',
       'engagements' => 7072,
       'geoLocation' => 
      array (
        0 => 
        (object) (array(
           'id' => 1428125,
           'title' => 'Canada',
           'type' => 'country',
        )),
      ),
       'brandCategories' => 
      array (
        0 => 
        (object) (array(
           'id' => 1,
           'title' => 'Television & Film',
        )),
      ),
       'ages' => '25-34',
    )),
    2 => 
    (object) (array(
       'socialId' => '11929849',
       'name' => 'donnahpham',
       'link' => 'https://instagram.com/donnahpham',
       'fullname' => '@donnahpham 🎀',
       'followers' => 577262,
       'picture' => 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/12142296_409514315904012_1226668063_a.jpg',
       'engagements' => 5758,
       'geoLocation' => 
      array (
        0 => 
        (object) (array(
           'id' => 1428125,
           'title' => 'Canada',
           'type' => 'country',
        )),
      ),
       'brandCategories' => 
      array (
        0 => 
        (object) (array(
           'id' => 1,
           'title' => 'Television & Film',
        )),
      ),
       'ages' => '25-34',
    )),
    3 => 
    (object) (array(
       'socialId' => '14662674',
       'name' => 'hayleaulaw',
       'link' => 'https://instagram.com/hayleaulaw',
       'fullname' => 'hayleau • hayley',
       'followers' => 432265,
       'picture' => 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/21433549_271955959966689_1091351009524973568_a.jpg',
       'engagements' => 17625,
       'geoLocation' => 
      array (
        0 => 
        (object) (array(
           'id' => 1428125,
           'title' => 'Canada',
           'type' => 'country',
        )),
      ),
       'brandCategories' => 
      array (
        0 => 
        (object) (array(
           'id' => 1,
           'title' => 'Television & Film',
        )),
      ),
       'ages' => '25-34',
    )),
  ),
));

		/*
			echo "<pre>";
			var_dump($reponse_ig);
			echo "</pre>"; die();
*/
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