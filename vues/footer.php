	</div>
			<!-- Modal Channels-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

    <div id="contentchannel" class="modal-content">
      <div class="modal-header">
      	<h2 id="title" class="card-title">{{title}}</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      	<!-- <div hidden class="" id="id">{{id}}</div> -->
      	<!-- <a target="_blank" href="https://www.youtube.com/channel/{{title}}"> -->
		<div class="row ">
			<div class=" col-md-3 ml-5">	
      			<img id="image" class="image" src="{{thumbnail}}" alt="{{title}}" style="width: 80px;"><!-- </a> -->
			</div>
      		<div class="col-md-7">	
      			<h4 id="description" class="card-text">{{description}}</h4>
      		</div>
      	</div>

      	<div class="row">
      		&nbsp;
      		&nbsp;
      	</div>
      	<div class="row mt-3 mb-3">
      		<div class=" row col-md-6">
      			<div>
					<h5 id="subscriberCount" class="card-text ml-5">{{subscriberCount}}</h5>
				</div>
				<div>
					<h5 class="card-text ">&nbsp; subscribers</h5>
				</div>
			</div>

			<div class="row col-md-6 align-right">
				<div>	
					<h5 id="videoCount" class="card-text ml-5 ">{{videoCount}}</h5>
				</div>
				<div>
					<h5 class="card-text ">&nbsp; videos</h5>
				</div>
			</div>
		</div>

		<div class="row mt-3 mb-3">
			<div class=" row col-md-6">
				<div>
					<h5 id="viewCount" class="card-text ml-5">{{viewCount}}</h5>
				</div>
				<div>
					<h5 class="card-text">&nbsp; views</h5>
				</div>
			</div>	
			<div class=" row col-md-6">
				<div>
					<h5 id="averageView" class="card-text ml-5">{{averageView}} </h5>
				</div>
				<div>
					<h5 class="card-text mr-2">&nbsp;views/video</h5>
				</div>
		</div>
		<div class="row mt-3 mb-3">
			<div class="col-md-3">
				<h5 id="country" class="card-text ml-5">{{country}}</h5>
			</div>
			<div class="col-md-9 text-right">
				<h5  hidden id="url" class="card-text">{{id}}</h5>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
        <button id="cmd" type="button" class="btn btn-primary">PDF</button>
        <button id="cmdScreenshotChannel" type="button" class="btn btn-primary">Screenshot</button>
        <button id="csvModal" type="button" class="btn btn-primary">CSV</button>

      </div>
    </div>
  </div>
</div>
</div>
	<!--fin modal channels-->

<!-- Modal Videos-->
<div class="modal fade" id="ModalVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div id="contentvideo" class="modal-content">
      <div class="modal-header">
        <h2 id="titlevideo" class="card-title ml-2">{{title}}</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row mt-3 mb-5 ml-23">
      		<div class="col-md-3" >
      			<img id="imagevideo" class="image" src="{{thumbnail}}" alt="{{title}}" style="width: 140px;">
      		</div>
      		<div class="col-md-8 mt-3 mb-3">
      			<h4 id="descriptionvideo" class="card-text">{{description}}</h4>
      		</div>
      </div>
      	<div class="row mt-3 mb-3 ml-2">
      		<div class="col-md-6">
				<h5 id="viewCountvideo" class="card-text">{{viewCount}} views</h5>
			</div>
			<div class="col-md-6">	
				<h5 id="dislikeCountvideo" class="card-text">{{dislikeCount}} dislike</h5>
			</div>
		</div>
		<div class="row mt-3 mb-3 ml-2">
			<div class="col-md-6">
				<h5 id="likeCountvideo" class="card-text">{{likeCount}} likes</h5>
			</div>
			<div class="col-md-6">
				<h5 id="favoriteCountvideo" class="card-text">{{favoriteCount}} favorite</h5>
			</div>
		</div>
		<div class="row mt-3 mb-3 ml-2">
			<div class="col-md-6">
				<h5 id="commentCountvideo" class="card-text">{{commentCount}} comments</h5>
				<h5 hidden id="urlvideo" class="card-text"></h5>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button id="cmdModalVideo" type="button" class="btn btn-primary">PDF</button>
        <button id="cmdScreenshotVideo" type="button" class="btn btn-primary">Screenshot</button>
        <button id="csvModalVideo" type="button" class="btn btn-primary">CSV</button>

      </div>
    </div>
  </div>
</div>
	<!--fin modal videos-->

	<footer class="infl-footer">
		<div class="row r1">
			<div class="col-md-4">
				<h3>Have a project in mind?</h3>
				<p>Let's partner up and bring it to life !</p>
				<a class="btn-footer" href="mailto:milad@imagemotion.com">Get in touch</a>
			</div>
			<div class="col-md-4">
				<h3>Montreal</h3>
				<p>1275 Avenue des Canadiens-de-Montreal, 5th floor <br>Montreal, Quebec. H3B 0G4 <br> T: +1 514 690 0623 <br>E: <a href="mailto:info@imagemotion.com">info@imagemotion.com</a></p>
			</div>
			<div class="col-md-4">
				<h3>New buisness inquiries</h3>
				<p>Milad Sahafzadeh <br>President <br>T: +1 514 690 0623 <br>E: <a href="mailto:milad@imagemotion.com">milad@imagemotion.com</a></p>
			</div>
		</div>
		<div class="row r2">
			<div class="container-fluid"></div>
		</div>
		<div class="row r3">
			<div class="col-md-4 s-footer">
				<ul>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-at" aria-hidden="true"></i></a></li>
				</ul>
			</div>
			<div class="col-md-8 text-right">
				<p>2017-2018 IMAGEMOTION Inc. | Social media . Influencer <br>Marketing . Content Creation | Montreal . Toronto</p>
			</div>
		</div>
	</footer>
	<script src="<?= PATH_THEME ?>js/infl-config.js" type="text/javascript"></script>
	<script src="<?= PATH_THEME ?>js/infl-main.js" type="text/javascript"></script>
	<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
	<script type="text/javascript" src="https://apis.google.com/js/client.js?onload=init"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
	<script src="https://github.com/niklasvh/html2canvas/releases/download/v0.5.0-beta4/html2canvas.js"></script>
	<!-- <script src="https://github.com/MrRio/jsPDF/blob/master/plugins/standard_fonts_metrics.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script> -->
</body>
</html>