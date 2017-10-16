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


});