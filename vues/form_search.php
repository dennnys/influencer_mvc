		<div class="row infl-forms">

			<div class="infl-sociale col-md-3 col-lg-2 text-center">
				<input id="infl-yt" type="radio" name="infl-sociale" value="youtube" checked>
				<label for="infl-yt" id="infl-yt-label"><i class="fa fa-youtube-play" aria-hidden="true"></i></label>
				<input id="infl-it" type="radio" name="infl-sociale" value="instagram">
				<label for="infl-it" id="infl-it-label"><i class="fa fa-instagram" aria-hidden="true"></i></label>
			</div>
	<!-- form youtube -->
			<form id="infl-form-yt" method="POST" class="col-md-12 infl-form-search">

				<div class="row">
					<div class="col-md-3 col-lg-2"></div>
					<div class="infl-search col-md-6 ">
						<input type="text" class="form-control" name="infl-inp-search-yt" id="infl-inp-search-yt" placeholder="YouTube input...">
					</div>
					<div class="infl-button col-md-3 col-lg-2 text-center">
						<div>
							<button class="btn btn-imm" type="submit">SEARCH</button>
						</div>
						
					</div>
				</div>

				<div class="row">
					<a class="ifl-btn-advaced col-md-12" data-toggle="collapse" href="#infl-filters-advanced-yt"><span>advance filters</span></a> 
				</div>
				<div id="infl-filters-advanced-yt" class="collapse">
					<div class="row justify-content-md-center ">
						<div class="form-group col-md-3">
							<label for="infl-category-yt">Category</label><br>
							<select name="infl-category-yt" id="infl-category-yt" class="form-control">
							  <option value=""></option>
							  <option value="1">category1</option>
							  <option value="2">category2</option>
							  <option value="3">category3</option>
							  <option value="4">category4</option>
							</select>
						</div>
						<div class="col-md-1"></div>
						<div class="form-group col-md-3">
							<label for="infl-country-yt">Country</label><br>
							<select name="infl-country-yt" id="infl-country" class="form-control">
							  <option value=""></option>
							  <option value="1">country1</option>
							  <option value="2">country2</option>
							  <option value="3">country3</option>
							  <option value="4">country4</option>
							</select>
						</div>
					</div>
					<div class="row justify-content-md-center ">
						<div class="form-group col-md-3">
							<label for="infl-subscr-min-yt">Subscribes</label><br>
							<input id="infl-subscr-min-yt" name="infl-subscr-min-yt" type="text" class="form-control col-md-4" placeholder="min">
							<input id="infl-subscr-max-yt" name="infl-subscr-max-yt" type="text" class="form-control col-md-4" placeholder="max">
						</div>
						<div class="col-md-1"></div>
						<div class="form-group col-md-3">
							<label for="infl-age-min-yt">Age</label><br>
							<input id="infl-age-min-yt" type="text" name="infl-age-min-yt" class="form-control col-md-4" placeholder="min">
							<input id="infl-age-max-yt" name="infl-age-max-yt" type="text" class="form-control col-md-4" placeholder="max">
						</div>
					</div>
					<div class="row justify-content-md-center ">
						<div class="form-group col-md-3">
							<label for="infl-views-min-yt">Total views</label><br>
							<input id="infl-views-min-yt" name="infl-views-min-yt" type="text" class="form-control col-md-4" placeholder="min">
							<input id="infl-views-max-yt" name="infl-views-max-yt" type="text" class="form-control col-md-4" placeholder="max">
						</div>
						<div class="col-md-1"></div>
						<div class="form-group col-md-3">
							<label for="infl-videos-min-yt">Total videos</label><br>
							<input id="infl-videos-min-yt" name="infl-videos-min-yt" type="text" class="form-control col-md-4" placeholder="min">
						</div>
					</div>

				</div><!-- end infl-filters-advanced -->

			</form>
			<!-- end form youtube -->
			<!-- form instagram -->
			<form id="infl-form-ig" method="POST" class="col-md-12 infl-form-search">

				<div class="row">
					<div class="col-md-3 col-lg-2"></div>
					<div class="infl-search col-md-6 ">
						<input type="text" class="form-control" name="infl-inp-search-ig" id="infl-inp-search-ig" placeholder="Instagram input...">
					</div>
					<div class="infl-button col-md-3 col-lg-2 text-center">
						<div>
							<button name="btn-ig-search" class="btn btn-imm" type="submit">SEARCH</button>
						</div>
						
					</div>
				</div>

				<div class="row">
					<a class="ifl-btn-advaced col-md-12" data-toggle="collapse" href="#infl-filters-advanced-ig"><span>advance filters</span></a> 
				</div>
				<div id="infl-filters-advanced-ig" class="collapse">
					<div class="row justify-content-md-center ">
						<div class="form-group col-md-3">
							<label for="infl-category-ig">Category</label><br>
							<select name="infl-category-ig" id="infl-category-ig" class="form-control">
							  <option value="">Select a category</option>

							</select>
						</div>
						<div class="col-md-1"></div>
						<div class="form-group col-md-3">
							<label for="infl-country-ig">Country</label><br>
							<select name="infl-country-ig" id="infl-country-ig" class="form-control">
							  <option value="">Select a contry</option>
							</select>
						</div>
					</div>
					<div class="row justify-content-md-center ">
						<div class="form-group col-md-3">
							<label for="infl-subscr-min-ig">Subscribes</label><br>
							<input id="infl-subscr-min-ig" name="infl-subscr-min-ig" type="text" class="form-control col-md-3" placeholder="min">
							<input id="infl-subscr-max-ig" name="infl-subscr-max-ig" type="text" class="form-control col-md-3" placeholder="max">
						</div>
						<div class="col-md-1"></div>
						<div class="form-group col-md-3">
							<label for="infl-age-min">Age</label><br>
							<input id="infl-age-min-ig" type="text" name="infl-age-min-ig" class="form-control col-md-4" placeholder="min">
							<input id="infl-age-max-ig" name="infl-age-max-ig" type="text" class="form-control col-md-4" placeholder="max">
						</div>
					</div>
					<div class="row justify-content-md-center ">
						<div class="form-group col-md-3">
							<label for="infl-engagement-min-ig">Engagements</label><br>
							<input id="infl-engagement-min-ig" name="infl-engagement-min-ig" type="text" class="form-control col-md-3" placeholder="min">
							<input id="infl-engagement-max-ig" name="infl-engagement-max-ig" type="text" class="form-control col-md-3" placeholder="max">
						</div>
						<div class="col-md-1"></div>
						<div class="form-group col-md-3">
							<label for="infl-token-ig">Token</label><br>
							<input id="infl-token-ig" name="infl-token-ig" type="text" class="form-control col-md-12" placeholder="token active" value="cpi5rfwn1q0wkoc">
						</div>
					</div>

				</div><!-- end infl-filters-advanced -->

			</form>
			<!-- end form instagram -->
		</div>