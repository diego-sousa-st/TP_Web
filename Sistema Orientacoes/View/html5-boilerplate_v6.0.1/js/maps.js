function initMap() {
	/*global google*/
	var latLong = {lat: -21.22781939, lng: -44.97836933};
	var map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 15,
	  center: latLong
	});
	var marker = new google.maps.Marker({
	  position: latLong,
	  map: map
	});
}
