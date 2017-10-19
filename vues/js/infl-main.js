function tplawesome(e,t){res=e;for(var n=0;n<t.length;n++){res=res.replace(/\{\{(.*?)\}\}/g,function(e,r){return t[n][r]})}return res}

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

 $("#searchchannels").on("click", function(e) 
 {
    console.log($("#infl-inp-search-yt").val());
     e.preventDefault();
       // prepare the request

       // if ($(this).attr("value") == "Search channels") 
        var apiKey = 'AIzaSyDLewZHq9HxLqZYw_Gt2_y75_Nl4LyDRk4';
        gapi.client.setApiKey(apiKey);
        gapi.client.load('youtube', 'v3', function() {
        isLoad = true;
   }); 
     q = encodeURIComponent($("#infl-inp-search-yt").val()).replace(/%20/g, "+");

         var request = 
           gapi.client.youtube.search.list
           ({
                part: "snippet",
                type: "channel",
                q: q,
                maxResults: 12,
                order: "viewCount",
                //chart:"mostPopular",
                publishedAfter: "2015-01-01T00:00:00Z"
           });
       
       
       // execute the request
       request.execute(function(response) 
       {
          var results = response.result;
          console.log(response.result)
          console.log(q)
          //console.log(results);
          //console.log(results.items[0].id.channelId);
          var test=results.items[0].id.channelId;
          

       //  console.log(requestById = 
       // gapi.client.youtub);
         $("#results").html("");
           $.each(results.items, function(index, item) 
           {
            item = getStats(item);
            //display(item);
          
          });   
       });
    //alert(1);
});//end $("#searchchannels").on("click", function() {

function getStats(item){
    //console.log("function getStats")
    var channelid= item.id.channelId;
    var key="AIzaSyCgsAOIicvJUL9b_OV8MFI6UoWf2typ1NA";
    var part="statistics, brandingSettings";
    var baseurl="https://www.googleapis.com/youtube/v3/channels/";
    var url=baseurl+"?"+"part="+part+"&id="+channelid+"&key="+key;

    //console.log("function getStats")
        $.ajax({

       url: url,
       async: false,
       data: {
          format: 'json'
       },
       error: function() {
          alert('<p>An error has occurred</p>');
            //return item;
            //item = concatJSON(item,data);
            //console.log(item)
            //return item;
            //display(item); 
        },
        success: function(data){
             item = concatJSON(item,data);
            //console.log(item.snippet.channelId)
            //return item;

            display(item);
        },
        type: 'GET'
    });
}//fin getStat

function display(item){
    //console.log("!!!!!!!!!!!ICI!!!!!!!"+JSON.stringify(item));
    $.get("vues/resultyt.html", function(data)
        {
            var params = {
                "id":item.snippet.channelId,
            "title":item.snippet.title, 
            "channeltitle":item.snippet.channelTitle, 
            "videoid":item.id.videoId, 
            "thumbnail":item.snippet.thumbnails.high.url, 
            "description":item.snippet.description,
            "subscriberCount":numberWithCommas(item.items[0].statistics.subscriberCount), 
             "viewCount":numberWithCommas(item.items[0].statistics.viewCount), 
            // "commentCount":stats.items[0].statistics.commentCount,
            "videoCount":numberWithCommas(item.items[0].statistics.videoCount),
            "averageView":numberWithCommas(Math.ceil(item.items[0].statistics.viewCount/item.items[0].statistics.videoCount)),
          //     if (json.item("country")){
    // "country" = json.getString("country"));}

    "country":item.items[0].brandingSettings.channel.country,
            
        }//fin params
        //if(page_name != '')
        //if(typeof page_name != 'undefined')
        // if (params.country !== "undifined" ){
        //       };
     $("#infl-resultat").append(tplawesome(data, [params]));
     //console.log(params.subscriberCount);
     //tri par defaut
    trier("video");
    });// fin $.get


}//fin fonction display
function init() {
    gapi.client.setApiKey("AIzaSyDLewZHq9HxLqZYw_Gt2_y75_Nl4LyDRk4");
    gapi.client.load("youtube", "v3", function() {
        // yt api is ready
        isLoad = true;
    });
}

function numberWithCommas(x) {
     return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
 }

 function concatJSON(jSon1, jSon2){
//console.log(jSon1)
//console.log(jSon2)
for (var key in jSon2){

    //console.log("key="+key);
    jSon1[key]= jSon2[key];

}
return jSon1;
}

function trier(type){
    if(type == "video"){
        $("#results div.item").sort(sort_item).appendTo('#infl-resultat');
    }else if(type == "video"){
        $("#results div.item").sort(sort_item).appendTo('#infl-resultat');
    }else if(type == "video"){
        $("#results div.item").sort(sort_item).appendTo('#infl-resultat');
    }  
}

function sort_item(a, b) {
    return parseInt(replace($(b).data('sort'))) > parseInt(replace($(a).data('sort'))) ? 1 : -1;
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
        trier("video");
    })
    $("#btnViews").click(function(){
        trier("video");
    })
}
});// end jQuery

