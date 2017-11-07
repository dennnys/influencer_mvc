<?php 
require_once 'header.php';

require_once 'form_search.php';
?>
	<div class="row">
	
	</div>

<div class="row">
	<div class="col-md-6">Remaining: <?= $data->quota_remaining ?>
	</div>
	<div class="infl-export col-md-6">
		export result: 
		<a href="<?= $data->visual_report ?>">PDF</a> - 
		<a href="#">CSV</a>
	</div>
</div>
<br>
<div class="row" id="infl-resultat">

	<div class="col-sm-2"><img src="<?= $data->picture ?>" alt="<?= $data->fullName ?>"></div>
	<div class="col-sm-1"></div>
	<div class="col-sm-9">
		<h2><a href="<?= $data->url ?>"><?= $data->fullName ?></a></h2>
		<p><b>Engagements:</b> <?= $data->engagements ?></p>
		<p><b>Followers:</b> <?= $data->followers ?></p>
		<p><b>Keywords:</b><br>
			
		</p>

		<p><b>Age:</b><br>
			
		</p>

		<p><b>Audience languages:</b><br>
		
		</p>

		<p><b>Brand affinity:</b><br>
			
		</p>

			<p><b>Audience Interests:</b><br>
			</p>

	</div>
	
</div>
<?php 
	}
require_once 'footer.php';
 ?>