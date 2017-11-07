

		

	<div class="card col-md-4 col-lg-3 col-sm-6" data-view="{{viewCount}}">
			  <div>
			  	<img class="card-img-top image ml-4 mx-auto d-block" src="{{thumbnail}}" alt="{{title}}">
			  </div>
			  <div class="card-body">
			    <h4 class="card-title title">{{title}}</h4>
			    <p class="card-text channeltitle">{{channeltitle}}</p>
			    <p class="card-text description">{{description}}</p>
			    <p class="card-text id">
			    	<a class="test" style="color:blue" target="_blank" href="https://www.youtube.com/video/{{id}}">ID:{{id}}</a>
			    </p>
			    <p class="card-text viewCount">{{viewCount}} views</p>
			    <p class="card-text likeCount">{{likeCount}} likes</p>
			    <p class="card-text dislikeCount">{{dislikeCount}} dislike</p>
			    
			    <p class="card-text commentCount">{{commentCount}} comments</p>
			    <p class="card-text favoriteCount">{{favoriteCount}} favorites</p>
			    <p hidden class="card-text urlvideo">http://youtube.com/channel/{{id}}</p>
			    <!-- <a href="<?= PATH ?>reportig/<?= $account->socialId ?>" class="btn btn-imm">raport...</a> -->
			    <!-- <a class="id" style="color:blue" target="_blank" href="https://www.youtube.com/video/{{id}}">{{title}}</a> -->
			  </div>


			</div>
	
