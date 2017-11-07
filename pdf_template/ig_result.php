<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Instagram PDF</title>
	<style>
		.pdf_ig {
			font-family: Arial;
		}
		.pdf_ig h3{
			margin: 5px 0;
		}
		.pdf_ig .pdf-space {
			vertical-align: top;
			padding-left: 30px;
		}
		.pdf_ig .center {
			text-align: center;
		}
		.pdf_ig .right {
			text-align: right;
		}

		.pdf_ig table {
			width: 800px;
			margin: 0 auto;
		}
	</style>
</head>
<body>
		<?php 
			if (isset($_SESSION['temp_object'])) {
				$data = $_SESSION['temp_object'];
		?>
		<div class="pdf_ig">
			<h2 class="center">Instagram Search Results <?= date("Y-m-d H:i") ?></h2>
		<table>
			<?php 
			foreach ($data->accounts as $account) {
		 ?>
			<tr>
				<td class="right">
					<img src="<?= $account->picture ?>" alt="<?= $account->fullname ?>">
				</td>
				<td class="pdf-space">
					<h3><?= $account->fullname ?></h3>
					<div><?= $account->name ?></div>
					<div><?= $account->followers ?> followers</div>
					<div><?= $account->engagements ?> engagements</div>
					<div><?= $account->brandCategories[0]->title ?></div>
					<div>Ages: <?= $account->ages ?></div>
					<div><?= $account->geoLocation[0]->title ?></div>
				</td>
			</tr>
			<?php } //end foreach ?>
			</table>
		</div>
		<?php } ?>
</body>
</html>