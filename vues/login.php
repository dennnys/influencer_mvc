<?php 
	require_once 'header.php';
 ?>
		<div class="row">
			<form method="POST" class="col-md-5">
				<div class="col-md-12 form-group">
					<label for="infl-login">Login</label><br>
					<input id="infl-login" name="infl-login" type="text" class="form-control">
				</div>
				<div class="col-md-12 form-group">
					<label for="infl-pass">Password</label><br>
					<input id="infl-pass" name="infl-pass" type="password" class="form-control">
				</div>
				<div class="infl-button text-center">
					<div>
						<button class="btn btn-imm" name="infl-btn-login" type="submit">ENTER</button>
					</div>
				</div>
			</form>
		</div>

<?php 
	require_once 'footer.php';
 ?>