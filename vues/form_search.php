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
							<button id="searchchannels" class="btn btn-imm" type="submit">SEARCH</button>
						</div>
						
					</div>
				</div>

				<div class="row">
					<a class="ifl-btn-advaced col-md-12" data-toggle="collapse" href="#infl-filters-advanced-yt"><span>advanced filters</span></a> 
				</div>
				<div id="infl-filters-advanced-yt" class="collapse">
					<div class="row justify-content-md-center ">
						<div class="form-group col-md-3">
							<label for="infl-type-yt">Looking for</label><br>
							<select name="infl-type-yt" id="infl-type-yt" class="form-control">
							  <option value="channel">Channels</option>
							  <option value="video">Videos</option>
							  <option value="user">User</option>
							</select>
						</div>
						
						<div class="form-group col-md-3">
							<label for="infl-category-yt">Category</label><br>
							<select name="infl-country-yt" id="infl-category-yt" class="form-control"><option value="0"></option>
							  <option value="1">Film & Animation</option>
							  <option value="2">Autos & Vehicles</option>
							  <option value="10">Music</option>
							  <option value="15">U.S.A.</option>
							  <option value="17">Sports</option>
							  <option value="18">Short Movies</option>
							  <option value="19">Travel & Events</option>
							  <option value="20">Gaming</option>
							  <option value="21">Videoblogging</option>
							  <option value="22">People & Blogs</option>
							  <option value="23">Comedy</option>
							  <option value="24">Entertainment</option>
							  <option value="25">News & Politics</option>
							  <option value="26">Howto & Style</option>
							  <option value="27">Education</option>
							  <option value="28">Science & Technology</option>
							  <option value="29">Nonprofits & Activism</option>
							  <option value="30">Movies</option>
							  <option value="31">Anime/Animation</option>
							  <option value="32">Action/Adventure</option>
							  <option value="33">Classics</option>
							  <option value="34">Comedy</option>
							  <option value="35">Documentary</option>
							  <option value="36">Drama</option>
							  <option value="37">Family</option>
							  <option value="38">Foreign</option>
							  <option value="39">Horror</option>
							  <option value="40">Sci-Fi/Fantasy</option>
							  <option value="41">Thriller</option>
							  <option value="42">Shorts</option>
							  <option value="43">Shows</option>
							  <option value="44">Trailers</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label for="infl-resultat-page-yt">Results/page</label><br>
							<select name="infl-resultat-page-yt" id="infl-resultat-page-yt" class="form-control">
							  <option value="12">12</option>
							  <option value="24">24</option>
							  <option value="36">36</option>
							  <option value="48">48</option>
							</select>
						</div>
						<div id="infl-location" class="form-group col-md-3 hidden">
							<label for="infl-location-yt">Location</label><br>
							<select name="infl-location-yt" id="infl-location-yt" class="form-control">
							  <option value="0"></option>
							  <option value="45.501689, -73.567256">Montreal</option>
							  <option value="43.653226, -79.383184">Toronto</option>
							  <option value="49.282729, -123.120738">Vancouver</option>
							</select>
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
			&nbsp;
			<div id="sortby" class="col-md-12"></div>
			<div class="row" id="infl-resultat"></div>
			<div id="scrollprev"></div>
			<div class="ml-auto"id="scrollnext"></div>
		</div>

		


