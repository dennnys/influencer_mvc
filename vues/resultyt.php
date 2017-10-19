<!-- <div class="row">
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
				<a href="#">PDF</a> - 
				<a href="#">CSV</a>
			</div>
</div><!--fin row-->

			
	<div class="card col-md-4 col-lg-3 col-sm-6" >
		<div class="item" data-sort="{{videoCount}}">
			<div class="card-body">
				<h4 class="card-title"><a target="_blank" href="{{id}}">{{title}}</a></h4>
			    <!-- <iframe class="video w100" width="640" height="360" src="//www.youtube.com/embed/{{videoid}}" frameborder="0" allowfullscreen></iframe> -->
			   <img src="{{thumbnail}}" alt="Smiley face" width="80">
			   <!-- <img src="{{thumbnail}}" style="width: 80px; margin-right: 10px;" align="left" alt=""> -->
			   <div class="card-text">{{description}}</div>
			  <!--  viewCount":"0","commentCount":"0","subscriberCount":"6155929","hiddenSubscriberCount":false,"videoCount":"0" -->
			  	<div class="card-text">{{subscriberCount}} suscribers</div>
			  	<div class="card-text">{{videoCount}} videos</div>
			    <div class="card-text">{{viewCount}} views</div>
			    <div class="card-text">{{averageView}} views / video</div>
			    <div class="card-text">{{country}}</div>
		</div><!--fin class="item" data-sort="{{videoCount}}-->
	</div>
	</div>
	
