

		
	
	<div class="card col-md-4 col-lg-3 col-sm-6" data-sort="{{videoCount}}" data-subs="{{subscriberCount}}" data-view="{{viewCount}}">
		
			  <div>
			  	<img class="card-img-top image ml-4 mx-auto d-block" 
			  	style="width:160px;" src="{{thumbnail}}" alt="{{title}}" >
			  </div>
			  <div class="card-body">
			    <h4 class="card-title title">{{title}}</h4>
			    <p class="card-text description">{{description}}</p>
			    <p class="card-text id"><a class="test" style="color:blue" target="_blank" href="https://www.youtube.com/channel/{{id}}">ID:{{id}}</a></p>
					<div class="row">
			    		<p class="card-text ml-3 subscriberCount">{{subscriberCount}}</p>
			    		<p>&nbsp suscribers</p>
			    	</div>
			    	<div class="row">
					    <p class="card-text ml-3 videoCount">{{videoCount}}</p> 
					    <p>&nbsp videos</p>
					</div>
					<div class="row">
					    <p class="card-text ml-3 viewCount">{{viewCount}}</p> 
					    <p>&nbsp views</p>
					</div>
					<div class="row">
					    <p class="card-text ml-3 averageView">{{averageView}}</p> 
					    <p>&nbsp views / video</p>
					</div>
			    	<p class="card-text country">{{country}}</p>
			    	<p hidden class="card-text url">http://youtube.com/channel/{{id}}</p>
			    <!-- <a href="<?= PATH ?>reportig/<?= $account->socialId ?>" class="btn btn-imm">raport...</a> -->
			  </div>
		


			</div>
	
