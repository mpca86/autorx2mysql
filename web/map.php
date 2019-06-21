<?php
	// Map
?>
<div id="mapid" style="width: 100%; height: 900px;"></div>
<script>

	var mymap = L.map('mapid').setView([48.2, 19.8], 8);

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibXBjYTg2IiwiYSI6ImNqbnc0c3Y5MDAzbnAzd21nZzhtNHByMTYifQ.nVQ13UWAxkBpbyGZPmXKmw', {
		maxZoom: 15,
		attribution: '© <a href="https://www.mapbox.com/about/maps/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> ',
		id: 'mapbox.outdoors'
	}).addTo(mymap);

</script>
