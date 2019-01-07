
$(".season-select").change(function() {
	/* Populates episode dropdown selector appropriate to selected season.
	Dropdown is cleared and repopulated every time a season is selected in the season
	dropdown menu  */
	var seasonId = $(this).val();
	if ($(".episode-selector")) {
		$(".episode-selector").remove();
	}
	$.ajax({
		url: 'http://asservedonscreen.test/getepisodejson',
		method: "GET",
		data: {'seasonId': seasonId},
		dataType: "json"
	})
	.done(function(data) {
		for (var i=0; i<data['result'].length; i++) {
			var title = data['result'][i]['title'];
			var episodeId = data['result'][i]['episodeId'];
			$(".select-episodes").append("<option class=\"episode-selector\" value=\""+ episodeId + "\">" + title + "</option>"); 
		}
	})
});

$('.select-episodes').on('change', function() {
	/* Changes id of See Restaurants button to appropriate Episode Id
	to send to server for restaurant list population */
	var episodeId = $(this).val();
	$('.get-restaurants').attr('id', episodeId);
});

$('.get-restaurants').click(function() {
	/* Adds tiles with link to information and image of each restaurant in the selected episode.
	Remove restaurants that have been populated already. */
	var episodeId = $(this).attr('id');
	if ($('.restaurant-card')) {
		$('.restaurant-card').remove();
	}
	$.ajax({
		url: 'http://asservedonscreen.test/getrestaurantjson',
		method: "GET",
		data: {'episodeId': episodeId}
		})
	.done(function(data) {
		for (var i = 0; i < data['result'].length; i++) {
			var restaurantName = data['result'][i]['name'];
			var restaurantId = data['result'][i]['id'];
			var restaurantImageUrl = data['result'][i]['imageUrl'];
			var tvShowId = data['result'][i]['tvShowId'];
			var url = Routing.generate('restaurantInfo', {'tvShowId': tvShowId, 'restaurantId': restaurantId}); 
			$('.restaurants').append('<div class="col-md-4 restaurant-card">' +
															'<div class="card mb-4 shadow-sm">' +
															'<div class="card-img" ' +
															'style="background-image: ' +
															'url(\'../assets/images/' + restaurantImageUrl + '\');">' +
															'</div>' +
															'<div class="card-body">'+
															'<a class="card-link card-text" href="' + url + '"' + 
															'<h2 class="card-text">' + restaurantName + '</h2>' +
															'</a></div></div></div>');
		}
	})
})