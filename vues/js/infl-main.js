/**
 * Influencer-Main JS
 *
 * File managing events and front ends.
 *
 * Javascript 
 * JQuery
 * Ajax
 *
 * @author     Denis Birnaz, Maxime Bourrier
 * @version    1.01
 */


var nextPageToken, prevPageToken;
var firstPage=true;
var type = 'channel';
var maxResults = 12;
var resultsArray = [];
var nbItemsTraites = 0;
var numresults = 0;
var canvasl; 
var q = 0;
var radius = "50km";

//displays results
function tplawesome(e,t){res=e;for(var n=0;n<t.length;n++){res=res.replace(/\{\{(.*?)\}\}/g,function(e,r){return t[n][r]})}return res}

//query builder
function execRequest(type, maxResults, pageToken){

  q = encodeURIComponent($("#infl-inp-search-yt").val()).replace(/%20/g, "+");
          console.log(type);
          var params = {
                part: "snippet",
                type: type || "channel",
                q: q,
                maxResults: maxResults || "12",
                order: "viewCount",
                //chart:"mostPopular",
                //publishedAfter: "2015-01-01T00:00:00Z",
                pageToken:pageToken
           };

          var category = $("#infl-category-yt").val();
          var location = $("#infl-location-yt").val();
          //console.log("category="+category);
          var typeCat = $("#infl-type-yt").val();

           if (category != 0){
            params[typeCat+'CategoryId'] = category;

           }
           console.log(JSON.stringify(params));

           if (location != 0){
            params["location"] = location;
             console.log(location);
            params["locationRadius"] = radius;  

           }

           if (type == "user"){
              //var key = 'forUsername';
              delete params.q;
              params['forUsername'] = q;
               params['type'] = "channel";
               type = "channel";
            }

console.log(type);           
console.log(params);

           
         var request = 
           gapi.client.youtube.search.list
           (params);

           console.log(request);
           
       // execute the request
       request.execute(function(response) 
       {
          var results = response.result;
          console.log(response.result)
         
          var test=results.items[0].id.channelId;
          numresults = results.pageInfo.totalResults;
          resultsArray = [];
          
          var resultCount = response.pageInfo.totalResults;
                nextPageToken=response.nextPageToken;
                prevPageToken=response.prevPageToken != pageToken ? response.prevPageToken : undefined;
                //si response est differente de pageToken donne lui la valeur de prevPageToken
                //sinon donne la valeur undifined 
          
         //affichage des resultats       
         $("#infl-resultat").html("");

        if (prevPageToken){
          //previous button
         $('#scrollprev').html("<div id=\"page\"><button type=\"button\" id=\"prevPageButton\">Prev Page</button></div>");

        }

        if (nextPageToken){
          //next button
        $('#scrollnext').html("<div id=\"page\"><button type=\"button\" id=\"nextPageButton\">Next Page</button></div>");
      }
      $('#nextPageButton').on("click", function(e)
    {
       //execute la requete avec ses parametres
        execRequest(type,maxResults,nextPageToken);
    });
    
     $('#prevPageButton').click(function()
    {
       //execute the query for the next results
        execRequest(type,maxResults,prevPageToken);
    });
     
     displaySort();

          //for each result of the array get the statistics...
           $.each(results.items, function(index, item) 
           {
            item = getStats(item, type, maxResults);
            //display(item);
          
          });   
       });
}

//displays the sorting div
function displaySort(){

$('#sortby').html(
  
      '<div class="infl-sort col-md-12">'+
      '<div class="row">'+
        '<div class="form-group col-md-4">'+
          '<div class="row">'+

            '<div class="mt-2">'
              +'<label for="">Sort by: &nbsp</label>'
            +'</div>'
          +'<select name="infl-sort" id="yt-sort" class="form-control col-md-5">'
                +'<option  selected="selected value=""></option>'+
                '<option  value="triersubs">Subscribers</option>'+
                  '<option value="triervideo" ">Videos</option>'+
                  '<option value="trierviews">Views</option>'+
            '</select>'+
            '<select name="infl-sort-sens" id="yt-sort-sens" class="form-control col-md-4">'+
                  '<option value="1">UP</option>'+
                  '<option value="2">DOWN</option>'+
            '</select>'+
            '</div>'+
        '</div>'+
        '<div class="infl-export col-md-4 text-right mt-2">'+
              'export results: '+
              '<a id="cmdPage" href="#">PDF -</a>'+
              '<a id="screenshotChannels" href="#"> Screenshot -</a>'+
              '<a id="csvPage" href="#"> CSV</a>'+
          '</div>'+
          '<div class=" col-md-3 mt-2  ml-auto text-right" id="numresults">'+
      '</div>'+
      '</div>'+
      
      '<div>'+
      '</div>'+
'</div>'+
'<a id="pdfdownload"></a>');
//formating numbers
$("#numresults").text(numberWithCommas(numresults)+" results");
//sort by
$('#yt-sort').on('change', function()
{
  if($('#yt-sort-sens').val() == 1){
    trier(this.value);
  }else{
    trierAsc(this.value);
  }
});
//sort up or down
$('#yt-sort-sens').on('change', function()
{
  if(this.value == 1){
    trier($('#yt-sort').val());
  }else{
    trierAsc($('#yt-sort').val());
  }
});
//screenshot link
$('#screenshotChannels').click(function (){

html2canvas($("#infl-resultat"), {
  onrendered: function(canvas) {
      canvas.setAttribute("id", "canvas");


      document.body.appendChild(canvas);
  
    var imageData = document.getElementById('canvas').toDataURL("image/png");
    
    //debut telechargement image
    var valeurRecherche = $("#infl-inp-search-yt").val();
     $('#pdfdownload').attr('href', imageData);
     $('#pdfdownload').attr('download',valeurRecherche+'.png');
     $('#pdfdownload')[0].click();
    document.getElementById('canvas').remove();
    //fin telechargement image
    
  },
    allowTaint: false,
    useCORS: true,
    proxy:"https://yt3.ggpht.com",
    logging:true
   });
 
 });//fin $('#screenshotChannels').click(function ()

//screenshot for the channel modal
$('#cmdScreenshotChannel').click(function (){

html2canvas($("#contentchannel"), {
  onrendered: function(canvas) {
      canvas.setAttribute("id", "canvas");


      document.body.appendChild(canvas);
  
    var imageData = document.getElementById('canvas').toDataURL("image/png");
    
    
    //debut telechargement image
    var valeurRecherche = $("#title").val();
     $('#pdfdownload').attr('href', imageData);
     $('#pdfdownload').attr('download',valeurRecherche+'.png');
     $('#pdfdownload')[0].click();
document.getElementById('canvas').remove();
    //fin telechargement image

  },
    allowTaint: false,
    useCORS: true,
    proxy:"https://yt3.ggpht.com",
    logging:true
   });
 
 });//fin $('#screenshotChannels').click(function ()

//screenshot for the video modal
$('#cmdScreenshotVideo').click(function (){

html2canvas($("#ModalVideo"), {
  onrendered: function(canvas) {
      canvas.setAttribute("id", "canvas");


      document.body.appendChild(canvas);
  
    var imageData = document.getElementById('canvas').toDataURL("image/png");
    
    
    //debut telechargement image
    var valeurRecherche = $("#titlevideo").val();
     $('#pdfdownload').attr('href', imageData);
     $('#pdfdownload').attr('download',valeurRecherche+'.png');
     $('#pdfdownload')[0].click();
document.getElementById('canvas').remove();
    //fin telechargement image
    
    ///debut telechargement pdf
         //var doc = new jsPDF();
         //doc.addImage(imageData, 'JPEG', 0, 0);
         //doc.save(valeurRecherche+'.pdf');
    ///fin telechargement pdf

  },
    allowTaint: false,
    useCORS: true,
    proxy:"https://i.ytimg.com/vi/",
    logging:true
   });
 
 });//fin $('#screenshotChannels').click(function ()

//pdf transformation
$(function () {

    var specialElementHandlers = 
    {
        '#editor': function (element,renderer) 
        {
            return true;
        }
    };
 $('#cmdPage').click(function () 
 {
  q = encodeURIComponent($("#infl-inp-search-yt").val()).replace(/%20/g, "+");

        var doc = new jsPDF();
        doc.fromHTML(
            $('#infl-resultat').html(), 15, 15, 
            { 'width': 170, 'elementHandlers': specialElementHandlers }, 
            function(){ doc.save(q+'.pdf'); }
        );

}); 

 $('#csvPage').click(function () {
    var value = $('#infl-type-yt').val();

    if (value =="channel")
    {
      var csvFormat = convertToCSV(resultsArray);
    }else 
    {
      var csvFormat = convertToCSVVideos(resultsArray);
    }

});//end $('#csvPage').click(function () {

//channel modal to cvs
$('#csvModal').click(function () 
 {
  console.log("'#csvModal').click(function")
  var csvFormat = convertToCSVModal();

});//end $('#csvModal').click(function ()   

//video modal to cvs
$('#csvModalVideo').click(function () 
 {
  console.log("'#csvModalVideo').click(function")
  var csvFormat = convertToCSVVideo();

});//end $('#csvModalVideo').click(function ()

});//end function 
}//end displaySort


jQuery(document).ready(function ($) {


$('#infl-yt-label').on('click', function() {
    //$('#infl-inp-search').attr("placeholder","YouTube input...");
    $('#infl-form-ig').hide();
    $('#infl-form-yt').show();
});

$('#infl-it-label').on('click', function() {
    //$('#infl-inp-search').attr("placeholder","Instagram input...");
    $('#infl-form-yt').hide();
    $('#infl-form-ig').show();
});
//display the location dropdown
$(function() {
    $('#infl-location').hide(); 
    $('#infl-type-yt').change(function(){
        if($('#infl-type-yt').val() == 'video') {
            $('#infl-location').show(); 
        } else {
            $('#infl-location').hide(); 
        } 
    });
});

//search button
 $("#searchchannels").on("click", function(e) 
 {
    $('#infl-resultat').empty();
    $('#scrollprev').empty();
    $('#scrollnext').empty();
     
     e.preventDefault();
       // prepare the request

       // if ($(this).attr("value") == "Search channels") 
        var apiKey = 'AIzaSyDLewZHq9HxLqZYw_Gt2_y75_Nl4LyDRk4';
        gapi.client.setApiKey(apiKey);
        gapi.client.load('youtube', 'v3', function() {
            isLoad = true;
            type = $("#infl-type-yt").val();
            console.log("LE TYPE ICI :"+type);
            maxResults = $("#infl-resultat-page-yt").val()
            execRequest(type,maxResults);
        }); 
     
});//end $("#searchchannels").on("click", function()
});

//second YouTube API query
function getStats(item, type, maxResults){
    var part="statistics";
    if (type !== 'video'){
      part+=", brandingSettings";
    }
    var id= item.id.channelId || item.id.videoId;
    var key="AIzaSyCgsAOIicvJUL9b_OV8MFI6UoWf2typ1NA";
    
    var baseurl="https://www.googleapis.com/youtube/v3/"+type+"s/";
    var url=baseurl+"?"+"part="+part+"&id="+id+"&key="+key;

        $.ajax({

       url: url,
       async: false,
       data: {
          format: 'json'
       },
       error: function() {
          
        },
        success: function(data){
             item = concatJSON(item,data);
             resultsArray.push(item);
             nbItemsTraites++;
             if(nbItemsTraites == maxResults){
              console.log(resultsArray);
             }

            console.log(data);
            //return item;

          if (type == "video"){
            displayVideo(item);
          }else{

            display(item);
          }
        },
        type: 'GET'
    });
}//fin getStat

function display(item){
    $.get("vues/resultyt.php", function(data)
        {
            var params = {
            "id":item.snippet.channelId,
            "title":item.snippet.title, 
            "channeltitle":item.snippet.channelTitle, 
            "videoid":item.id.videoId, 
            "thumbnail":item.snippet.thumbnails.medium.url, 
            "description":item.snippet.description,
            "subscriberCount":numberWithCommas(item.items[0].statistics.subscriberCount), 
             "viewCount":numberWithCommas(item.items[0].statistics.viewCount), 
           
            "videoCount":numberWithCommas(item.items[0].statistics.videoCount),
            "averageView":numberWithCommas(Math.ceil(item.items[0].statistics.viewCount/item.items[0].statistics.videoCount)),
            "country":item.items[0].brandingSettings.channel.country || "country not available",
            
        }//fin params
     //send result to the div   
     $("#infl-resultat").append(tplawesome(data, [params]));
     
      //tri par defaut
      //trier("video");

    //display modal on click
    $(".card").on("click", function(e) 
    {
      
      copyImage =$(this).find('img').attr('src');
      copyTitle =$(this).find('img').attr('alt');
      $('#image').attr('src',copyImage);
      $('#image').attr('alt',copyTitle)
      
       $('#title').html($(this).find('.title').html());   
       $('#description').html($(this).find('.description').html());
       $('#subscriberCount').html($(this).find('.subscriberCount').html());
       $('#videoCount').html($(this).find('.videoCount').html());
       $('#viewCount').html($(this).find('.viewCount').html());
       $('#averageView').html($(this).find('.averageView').html());
       $('#url').html($(this).find('.test').attr('href'));
       $('#country').html($(this).find('.country').html());
       //modal call
      $('#myModal').modal();
    });//fin appel modal

    });// fin $.get

}//fin fonction display


function displayVideo(item){
    $.get("vues/resultyt_videos.php", function(data)
        {
         
            var params = {
            "id":item.id.videoId,
            "title":item.snippet.title, 
            "channeltitle":item.snippet.channelTitle, 
            "thumbnail":item.snippet.thumbnails.high.url, 
            "description":item.snippet.description,
             "viewCount":numberWithCommas(item.items[0].statistics.viewCount), 
            "likeCount":numberWithCommas(item.items[0].statistics.likeCount),
            "dislikeCount":numberWithCommas(item.items[0].statistics.dislikeCount),
            "favoriteCount":numberWithCommas(item.items[0].statistics.favoriteCount),
            "commentCount":item.items[0].statistics.commentCount ? numberWithCommas(item.items[0].statistics.commentCount):"0",
        }//fin params
        
     $("#infl-resultat").append(tplawesome(data, [params]));
     
     //tri par defaut
    //trier("trierviews");

     $(".card").on("click", function(e) 
    {

      copyImage =$(this).find('img').attr('src');
      copyTitle =$(this).find('img').attr('alt');
      $('#imagevideo').attr('src',copyImage);
      $('#imagevideo').attr('alt',copyTitle)
       $('#idvideo').html($(this).find('.id').html());     
       $('#titlevideo').html($(this).find('.title').html());   
       $('#descriptionvideo').html($(this).find('.description').html());
       $('#viewCountvideo').html($(this).find('.viewCount').html());
       videocount = $(this).find('.dislikeCount').html();
       $('#dislikeCountvideo').html($(this).find('.dislikeCount').html());
       $('#likeCountvideo').html($(this).find('.likeCount').html());
       $('#favoriteCountvideo').html($(this).find('.favoriteCount').html());
       $('#commentCountvideo').html($(this).find('.commentCount').html());
       $('#commentCountvideo').html($(this).find('.commentCount').html());
       $('#urlvideo').html($(this).find('.test').attr('href'));
      
      $('#ModalVideo').modal();
    });//fin appel modal

    });// fin $.get

}//fin fonction display

//initiating the API call
function init() {
    gapi.client.setApiKey("AIzaSyDLewZHq9HxLqZYw_Gt2_y75_Nl4LyDRk4");
    gapi.client.load("youtube", "v3", function() {
        // yt api is ready
        isLoad = true;
    });
}

//formating numbers with commas
function numberWithCommas(x) {
  //console.log('x = '+x);
     return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
 }

//merges both Json files
function concatJSON(jSon1, jSon2){

for (var key in jSon2){

    //console.log("key="+key);
    jSon1[key]= jSon2[key];

}
return jSon1;
}

//sorting the results
function trier(type){
    if(type == "video"){
        $("#infl-resultat div.card").sort(sort_item).appendTo('#infl-resultat');
        // console.log("triervideo")
    }else if(type == "triersubs"){
        $("#infl-resultat div.card").sort(sort_subs).appendTo('#infl-resultat');
        // console.log("triersubs")
    }else if(type == "trierviews"){
      // console.log("trierviews")
        $("#infl-resultat div.card").sort(sort_views).appendTo('#infl-resultat');
    }  
}

function trierAsc(type){
    if(type == "triervideo"){
        $("#infl-resultat div.card").sort(sort_item_asc).appendTo('#infl-resultat');
        // console.log("triervideo")
    }else if(type == "triersubs"){
        $("#infl-resultat div.card").sort(sort_subs_asc).appendTo('#infl-resultat');
        // console.log("triersubs")
    }else if(type == "trierviews"){
      // console.log("trierviews")
        $("#infl-resultat div.card").sort(sort_views_asc).appendTo('#infl-resultat');
    }  
}

function sort_item(a, b) {
    return parseInt(replace($(b).data('sort'))) > parseInt(replace($(a).data('sort'))) ? 1 : -1;
}
function sort_subs(a, b) {
    return parseInt(replace($(b).data('subs'))) > parseInt(replace($(a).data('subs'))) ? 1 : -1;
}
function sort_views(a, b) {
    return parseInt(replace($(b).data('view'))) > parseInt(replace($(a).data('view'))) ? 1 : -1;
}

function sort_item_asc(a, b) {
    return parseInt(replace($(b).data('sort'))) < parseInt(replace($(a).data('sort'))) ? 1 : -1;
}
function sort_subs_asc(a, b) {
    return parseInt(replace($(b).data('subs'))) < parseInt(replace($(a).data('subs'))) ? 1 : -1;
}
function sort_views_asc(a, b) {
    return parseInt(replace($(b).data('view'))) < parseInt(replace($(a).data('view'))) ? 1 : -1;
}


function replace(num){

    if(Number.isInteger(num) == false){
        return num.replace(/,/g,"");
    }
    return num;
}

function initTrie(){
    $("#btnVideo").click(function(){
        trier("video");
    })
    $("#btnSubscribers").click(function(){
      //alert("moussa a raison");
        trier("video");
    })
    $("#btnViews").click(function(){
        trier("video");
    })
}

//Creating the PDF for one channel
$(function () {

    var specialElementHandlers = 
    {
        '#editor': function (element,renderer) 
        {
            return true;
        }
    };
 $('#cmd').click(function () 
 {
  var title = $('#title a').text();
        var doc = new jsPDF();
        doc.fromHTML(
            $('#myModal').html(), 15, 15, 
            { 'width': 170, 'elementHandlers': specialElementHandlers }, 
            function(){ doc.save(title+'.pdf'); }
        );
}); 


});//fin function 
//Creating the PDF for one video
$(function () {

    var specialElementHandlers = 
    {
        '#editor': function (element,renderer) 
        {
            return true;
        }
    };

 $('#cmdModalVideo').click(function () 
 {
  var title = $('#titlevideo a').text();
        var doc = new jsPDF();
        doc.fromHTML(
            $('#ModalVideo').html(), 15, 15, 
            { 'width': 170, 'elementHandlers': specialElementHandlers }, 
            function(){ doc.save($('#title').html()+'.pdf'); }
        );
        

}); 
}); 

//Creating the CSV for the channels
function convertToCSV(objArray) {
    var json = objArray;
    console.log(json);
    //var fields = Object.keys(json[0]);
    var fields= ["url","kind","description","channelTitle","subscriberCount","viewCount","videoCount","view/video","country"];
    var str = "data:text/csv;charset=utf-8,";
    str += fields.join(',');
    str += '\n';
    for (var i = 0; i < objArray.length; i++) {
            var url = "https://www.youtube.com/channel/";
            var cvsValues =
            ['"'+url+objArray[i].snippet.channelId+'"',
            '"'+objArray[i].id.kind+'"', 
            '"'+objArray[i].snippet.description.replace(/"/g, "")+'"',
            '"'+objArray[i].snippet.channelTitle+'"', 
            '"'+objArray[i].items[0].statistics.subscriberCount+'"', 
             '"'+objArray[i].items[0].statistics.viewCount+'"', 
            // "commentCount":stats.items[0].statistics.commentCount,
            '"'+objArray[i].items[0].statistics.videoCount+'"',
            '"'+objArray[i].items[0].statistics.viewCount/objArray[i].items[0].statistics.videoCount+'"',
            '"'+(objArray[i].items[0].brandingSettings.channel.country || "country not available")+'"'].join(',');
            str+=cvsValues+'\n';

    }

    
      console.log(str);
      var encodedUri = encodeURI(str);
      window.open(encodedUri);
      q = encodeURIComponent($("#infl-inp-search-yt").val()).replace(/%20/g, "+");
      var link = document.createElement("a");
      link.setAttribute("href", encodedUri);
      link.setAttribute("download", q+".csv");
      document.body.appendChild(link); // Required for FF


      link.click(); // This will download the data file named "my_data.csv".

    //console.log(str);
            return str;
  }// fin function convertToCSV

//Creating the CSV for videos
  function convertToCSVVideos(objArray) {
    var json = objArray;
    console.log(json);
    //var fields = Object.keys(json[0]);
    var fields= ["channelId","kind","description","channelTitle","subscriberCount","viewCount","videoCount","view/video"];
    var str = "data:text/csv;charset=utf-8,";
    str += fields.join(',');
    str += '\n';
    for (var i = 0; i < objArray.length; i++) {

            var cvsValues =['"'+objArray[i].snippet.channelId+'"',
            '"'+objArray[i].id.kind+'"', 
            '"'+objArray[i].snippet.description.replace(/"/g, "")+'"',
            '"'+objArray[i].snippet.channelTitle+'"', 
            '"'+objArray[i].items[0].statistics.subscriberCount+'"', 
             '"'+objArray[i].items[0].statistics.viewCount+'"', 
            // "commentCount":stats.items[0].statistics.commentCount,
            '"'+objArray[i].items[0].statistics.videoCount+'"',
            '"'+objArray[i].items[0].statistics.viewCount/objArray[i].items[0].statistics.videoCount+'"'].join(',');
            //'"'+(objArray[i].items[0].brandingSettings.channel.country || "country not available")+'"'].join(',');
            str+=cvsValues+'\n';

    }

    
      console.log(str);
      var encodedUri = encodeURI(str);
      window.open(encodedUri);
      q = encodeURIComponent($("#infl-inp-search-yt").val()).replace(/%20/g, "+");
      var link = document.createElement("a");
      link.setAttribute("href", encodedUri);
      link.setAttribute("download", q+".csv");
      document.body.appendChild(link); // Required for FF

      link.click(); // This will download the data file named "my_data.csv".

    //console.log(str);
            return str;
  }// fin function convertToCSV

//Creating the CSV for videos
  function convertToCSVModal(){

    var fields= ["channelTitle","description","subscriberCount","viewCount","videoCount","view/video","URL","country"];
    var str = "data:text/csv;charset=utf-8,";
    str += fields.join(',');
    str += '\n';

    var cvsValues =['"'+ $('#title').html()+'"', 
            //'"'+objArray[i].id.kind+'"', 
            '"'+ $('#description').html()+'"',
            '"'+$('#subscriberCount').html()+'"', 
             '"'+$('#viewCount').html()+'"', 
            // "commentCount":stats.items[0].statistics.commentCount,
            '"'+$('#videoCount').html()+'"',
            '"'+ $('#averageView').html()+'"',
            '"'+$('#url').html()+'"',
            '"'+$('#country').html()+'"'].join(',');
            str+=cvsValues+'\n';

            //id =$('#id').attr('href');
            //console.log(id+" ID ICI!!!");
            console.log(str);

      var encodedUri = encodeURI(str);
      window.open(encodedUri);
      q = encodeURIComponent($("#infl-inp-search-yt").val()).replace(/%20/g, "+");
      var link = document.createElement("a");
      link.setAttribute("href", encodedUri);
      link.setAttribute("download", $('#title').html()+".csv");
      document.body.appendChild(link); // Required for FF

      link.click(); // This will download the data file named "my_data.csv".

      return str;

  }// fin function convertToCSVModal

  function convertToCSVVideo(){ 

    var fields= ["URL","channelTitle","description","viewCount","dislikeCount","likeCount","favoriteCount","commentCount"];
    var str = "data:text/csv;charset=utf-8,";
    str += fields.join(',');
    str += '\n';

    var cvsValues =['"'+$('#urlvideo').html()+'"',
            '"'+ $('#titlevideo').html()+'"', 
            '"'+ $('#descriptionvideo').html()+'"',
            '"'+$('#viewCountvideo').html()+'"', 
             '"'+$('#dislikeCountvideo').html()+'"', 
            // "commentCount":stats.items[0].statistics.commentCount,
            '"'+$('#likeCountvideo').html()+'"',
            '"'+ $('#favoriteCountvideo').html()+'"',
            '"'+ $('#commentCountvideo').html()+'"'].join(',');
            str+=cvsValues+'\n';

            //id =$('#id').attr('href');
            //console.log(id+" ID ICI!!!");
            console.log(str);

      var encodedUri = encodeURI(str);
      window.open(encodedUri);
      q = encodeURIComponent($("#infl-inp-search-yt").val()).replace(/%20/g, "+");
      var link = document.createElement("a");
      link.setAttribute("href", encodedUri);
      link.setAttribute("download", $('#title').html()+".csv");
      document.body.appendChild(link); // Required for FF

      link.click(); // This will download the data file named "my_data.csv".

      return str;

  }// fin function convertToCSVModal

