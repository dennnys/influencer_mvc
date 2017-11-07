<?php 
require_once 'header.php';

require_once 'form_search.php';

if (empty($data) || isset($data->error)) { 
	?>
	<div class="row">
	<?php 
		if(isset($data->error)) {
			echo "<h3>Your token has expired.</h3>";
		} else {
			echo "<h3>No result found !</h3>";
		}
	?>
	</div>
<?php 
} else {
 ?>
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

	<div class="col-sm-2"><img src="<?= $data->picture ?>" style="max-width: 100%" alt="<?= $data->fullName ?>"></div>
	<div class="col-sm-1"></div>
	<div class="col-sm-9">
		<h2><a href="<?= $data->url ?>"><?= $data->fullName ?></a></h2>
		<p><b>Engagements:</b> <?= $data->engagements ?></p>
		<p><b>Followers:</b> <?= $data->followers ?></p>
		<p><b>Tags:</b><br>
			<?php 
				foreach ($data->hashtags as $key => $value) {
					echo $key.' ';
				}
			?>
		</p>

		<p><b>Age:</b><br>
			<?php 
				foreach ($data->content_persons_statistic->ages as $key => $value) {
					echo '<i>'.$key.':</i> '.Utils::procent($value).'%<br>';
				}
			?>
		</p>

		<p><b>Audience languages:</b><br>
		<?php 
				foreach ($data->audience_languages as $key => $value) {
					echo '<i>'.$key.':</i> '.Utils::procent($value).'%<br>';
				}
			?>
		</p>

		<p><b>Brand affinity:</b><br>
			<?php 
				foreach ($data->brand_affinity as $key => $value) {
					echo '<i>'.$key.':</i> '.$value[0].'<br>';
				}
			?>
		</p>

			<p><b>Audience Interests:</b><br>
			<?php 
				foreach ($data->interests as $key => $value) {
					echo $value.' ';
				}
			?>
			</p>

	</div>
	
</div>
<?php 
	}
require_once 'footer.php';
 ?>