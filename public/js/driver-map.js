

/*
 * Initialize the google map with a marker.
 */
function initMap() {
	var carpooler1 = {lat: -25.363, lng: 131.044};
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 4,
		center: carpooler1
	});
	var marker = new google.maps.Marker({
		position: carpooler1,
		map: map
	});
}
