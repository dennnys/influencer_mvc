<?php 

require_once 'header.php';

require_once 'form_search.php';

ob_start();

if (empty($data->accounts)) { 
	?>
	<div class="row">
		<h3>Not rezultat !</h3>
	</div>
<?php 
} else {

 ?>


		<div class="row">
			<div class="infl-sort col-md-8">
				<div class="form-group">
					<label for="">Sort:</label>
					<select name="infl-category" id="infl-category" class="form-control col-md-2">
					  <option value="1">Name</option>
					  <option value="2">Subscribers</option>
					  <option value="3">Videos</option>
					  <option value="4">Date</option>
					</select>
					<select name="infl-category" id="infl-category" class="form-control col-md-2">
					  <option value="1">UP</option>
					  <option value="2">DOWN</option>
					</select>
				</div>
			</div>
			<div class="infl-export col-md-4">
				export result: 
				<a href="<?= PATH ?>pdfresultig">PDF</a> - 
				<a href="#">CSV</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">Results: <?= $data->total ?></div>
			<div class="col-md-6 text-right">Remaining requests: <?= $data->quota_remaining ?></div>
		</div>

		<div class="row" id="infl-resultat">
			<?php 
			foreach ($data->accounts as $account) {
		 ?>
			<div class="card col-md-4 col-lg-3 col-sm-6" >
			  <div>
			  	<img class="card-img-top" src="<?= $account->picture ?>" alt="<?= $account->fullname ?>">
			  </div>
			  <div class="card-body">
			    <h4 class="card-title"><a target="_blank" href="<?= $account->link ?>"><?= $account->fullname ?></a></h4>
			    <div class="card-text"><?= $account->geoLocation[0]->title ?></div>
			    <div class="card-text"><?= $account->followers ?> followers</div>
			    <p class="card-text"><?= $account->engagements ?> engagements</p>
			    <a href="<?= PATH ?>reportig/<?= $account->socialId ?>" class="btn btn-imm">raport...</a>
			  </div>
			</div>
			<?php } //end foreach ?>
		</div>

<?php 


	$temp_html = ob_get_clean();

	$_SESSION['temp_html'] = $temp_html;
	echo $_SESSION['temp_html'];	
	}

	require_once 'footer.php';

 ?>



