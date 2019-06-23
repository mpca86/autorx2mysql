<?php
$version = "SondeData 1.0";

$dbt = new MyDb();

session_start();

// Set Language variable
if(isset($_GET['lang']) && !empty($_GET['lang'])){
 $_SESSION['lang'] = $_GET['lang'];

 if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']){
  echo "<script type='text/javascript'> location.reload(); </script>";
 }
}

// Include Language file
if(isset($_SESSION['lang'])){
 include "lang/".$_SESSION['lang'].".php";
}else{
 include "lang/svk.php";
}

//

function TableLastSonde($si) {
global $dbt;

$result = $dbt -> getlatestSondes($si);
$sondes = count($result); 

echo '<table class="blueTable">';
echo '<thead><tr>';
echo '<th>' . _LASTDATE . '</th>';
echo '<th>' . _STATION . '</th>';
echo '<th>' . _CALLSIGN . '</th>';
echo '<th>' . _TIME . '</th>';
echo '<th>' . _FREQUENCY .'</th>';
echo '<th>' . _LAT .'</th>';
echo '<th>' . _LON .'</th>';
echo '<th>' . _SATELITES .'</th>';
echo '<th>' . _ALTITUDE .'</th>';
echo '<th>' . _DIRECTION .'</th>';
echo '<th>' . _DISTANCE .'</th>';
echo '<th>' . _SPEED .'</th>';
echo '<th>' . _BT .'</th>';
echo '<th>' . _TEMPERATURE .'</th>';
echo '<th>' . _HUMIDITY .'</th>';
echo '<th>' . _BATTERY .'</th>';
echo '<th>' . _EVEL .'</th>';
echo '<th>' . _BEAR .'</th>';
echo '<th>' . _COMMENT .'</th>';
echo '</tr></thead>';

for ($i = 0; $i <= ( $sondes - 1 ); $i++) {
	echo '<tbody><tr>';
 	echo '<td>'. $result[$i]['last_date'] . '</td>';
	echo '<td>'. $result[$i]['station'] . '</td>';
	echo '<td>'. $result[$i]['callsign'] . '</td>';
	echo '<td>'. $result[$i]['time'] . '</td>';
	echo '<td>'. $result[$i]['freq'] . '</td>';
    echo '<td>'. $result[$i]['lat'] . '</td>';
    echo '<td>'. $result[$i]['lon'] . '</td>';
    echo '<td>'. $result[$i]['sats'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['alt'],1) . '</td>';
	echo '<td>'. $result[$i]['direction'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['distance'],1) . '</td>';
    echo '<td>'. $result[$i]['speed'] . '</td>';
    echo '<td>'. $result[$i]['bt'] . '</td>';
    echo '<td>'. $result[$i]['temp'] . '</td>';
    echo '<td>'. $result[$i]['hum'] . '</td>';
    echo '<td>'. $result[$i]['batt'] . '</td>';
    echo '<td>'. $result[$i]['evel'] . '</td>';
    echo '<td>'. $result[$i]['bear'] . '</td>';
    echo '<td>'. $result[$i]['comment'] . '</td>';
	echo '</tr></tbody>';
}
echo '</table>';
}

$result = $dbt -> getlatestSondesalldata($si);
$sondes = count($result); 

echo '<table class="blueTable">';
echo '<thead><tr>';
echo '<th>' . _LASTDATE . '</th>';
echo '<th>' . _STATION . '</th>';
echo '<th>' . _CALLSIGN . '</th>';
echo '<th>' . _TIME . '</th>';
echo '<th>' . _FREQUENCY .'</th>';
echo '<th>' . _LAT .'</th>';
echo '<th>' . _LON .'</th>';
echo '<th>' . _SATELITES .'</th>';
echo '<th>' . _ALTITUDE .'</th>';
echo '<th>' . _DIRECTION .'</th>';
echo '<th>' . _DISTANCE .'</th>';
echo '<th>' . _SPEED .'</th>';
echo '<th>' . _BT .'</th>';
echo '<th>' . _TEMPERATURE .'</th>';
echo '<th>' . _HUMIDITY .'</th>';
echo '<th>' . _BATTERY .'</th>';
echo '<th>' . _EVEL .'</th>';
echo '<th>' . _BEAR .'</th>';
echo '<th>' . _COMMENT .'</th>';
echo '</tr></thead>';

for ($i = 0; $i <= ( $sondes - 1 ); $i++) {
	echo '<tbody><tr>';
 	echo '<td>'. $result[$i]['last_date'] . '</td>';
	echo '<td>'. $result[$i]['station'] . '</td>';
	echo '<td>'. $result[$i]['callsign'] . '</td>';
	echo '<td>'. $result[$i]['time'] . '</td>';
	echo '<td>'. $result[$i]['freq'] . '</td>';
    echo '<td>'. $result[$i]['lat'] . '</td>';
    echo '<td>'. $result[$i]['lon'] . '</td>';
    echo '<td>'. $result[$i]['sats'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['alt'],1) . '</td>';
	echo '<td>'. $result[$i]['direction'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['distance'],1) . '</td>';
    echo '<td>'. $result[$i]['speed'] . '</td>';
    echo '<td>'. $result[$i]['bt'] . '</td>';
    echo '<td>'. $result[$i]['temp'] . '</td>';
    echo '<td>'. $result[$i]['hum'] . '</td>';
    echo '<td>'. $result[$i]['batt'] . '</td>';
    echo '<td>'. $result[$i]['evel'] . '</td>';
    echo '<td>'. $result[$i]['bear'] . '</td>';
    echo '<td>'. $result[$i]['comment'] . '</td>';
	echo '</tr></tbody>';
}
echo '</table>';
}

function TableLatestSondes($si) {
global $dbt;

$result = $dbt -> getlatestSondes($si);
$sondes = count($result); 

echo '<table class="blueTable">';
echo '<thead><tr>';
echo '<th>Last Date</th>';
echo '<th>Station</th>';
echo '<th>Callsign</th>';
echo '<th>Frequency</th>';
echo '<th>Altitude (M)</th>';
echo '<th>Direction</th>';
echo '<th>Distance (KM)</th>';
echo '</tr></thead>';

for ($i = 0; $i <= ( $sondes - 1 ); $i++) {
	echo '<tbody><tr>';
 	echo '<td>'. $result[$i]['last_date'] . '</td>';
	echo '<td>'. $result[$i]['station'] . '</td>';
	echo '<td>'. $result[$i]['callsign'] . '</td>';
	echo '<td>'. $result[$i]['freq'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['alt'],1) . '</td>';
	echo '<td>'. $result[$i]['direction'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['distance'],1) . '</td>';
	echo '</tr></tbody>';
}
echo '</table>';

}

function MapSondes($si) {
global $dbt;

$result = $dbt -> getlatestSondes($si);
$sondes = count($result); 

echo '<div id="mapid" style="width: 100%; height: 600px;"></div>';
echo '<script>var mymap = L.map(\'mapid\').setView([49.14, 20.13], 8); L.tileLayer(\'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibXBjYTg2IiwiYSI6ImNqbnc0c3Y5MDAzbnAzd21nZzhtNHByMTYifQ.nVQ13UWAxkBpbyGZPmXKmw\', {maxZoom: 15, attribution: \'© <a href="https://www.mapbox.com/about/maps/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> \',	id: \'mapbox.outdoors\'	}).addTo(mymap);';
for ($i = 0; $i <= ( $sondes - 1 ); $i++) {
echo "L.marker([" . $result[$i]['lat']. ", " . $result[$i]['lon'] . "]).addTo(mymap)\r\n
                .bindPopup(\"<b>" . $result[$i]['callsign'] . "</b><br />Teplota: " . $result[$i]['temp'] . "°C<br />Vlhkosť: " . $result[$i]['hum'] . "%<br />Výška: " . $result[$i]['alt'] . " m<br />Batérie: " . $result[$i]['batt'] . " V<br />Smer: ". $result[$i]['direction'] . "<br />Čas merania: " . $result[$i]['last_date'] . " \" )\r\n";
}
echo '</script>';
}

// Alt
function MaxAlt() {
global $dbt;

	$SQL = "SELECT * FROM sondedata ORDER BY alt DESC LIMIT 1";

	$result = $dbt -> select($SQL);

	$rows = count($result); 
	
echo '<table class="blueTable">';
echo '<thead><tr>';
echo '<th>Last Date</th>';
echo '<th>Station</th>';
echo '<th>Callsign</th>';
echo '<th>Frequency</th>';
echo '<th>Altitude (M)</th>';
echo '<th>Direction</th>';
echo '<th>Distance (KM)</th>';
echo '</tr></thead>';

for ($i = 0; $i <= ( $rows - 1 ); $i++) {
	echo '<tbody><tr>';
 	echo '<td>'. $result[$i]['last_date'] . '</td>';
	echo '<td>'. $result[$i]['station'] . '</td>';
	echo '<td>'. $result[$i]['callsign'] . '</td>';
	echo '<td>'. $result[$i]['freq'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['alt'],1) . '</td>';
	echo '<td>'. $result[$i]['direction'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['distance'],1) . '</td>';
	echo '</tr></tbody>';
}
echo '</table>';
}

function MinAlt() {
global $dbt;

	$SQL = "SELECT * FROM sondedata ORDER BY alt ASC LIMIT 1";

	$result = $dbt -> select($SQL);

	$rows = count($result); 
	
	echo '<table class="blueTable">';
echo '<thead><tr>';
echo '<th>Last Date</th>';
echo '<th>Station</th>';
echo '<th>Callsign</th>';
echo '<th>Frequency</th>';
echo '<th>Altitude (M)</th>';
echo '<th>Direction</th>';
echo '<th>Distance (KM)</th>';
echo '</tr></thead>';

for ($i = 0; $i <= ( $rows - 1 ); $i++) {
	echo '<tbody><tr>';
 	echo '<td>'. $result[$i]['last_date'] . '</td>';
	echo '<td>'. $result[$i]['station'] . '</td>';
	echo '<td>'. $result[$i]['callsign'] . '</td>';
	echo '<td>'. $result[$i]['freq'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['alt'],1) . '</td>';
	echo '<td>'. $result[$i]['direction'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['distance'],1) . '</td>';
	echo '</tr></tbody>';
}
echo '</table>';
}


function FirstMaxAlt() {
global $dbt;

	$SQL = "SELECT * FROM first_seen ORDER BY alt DESC LIMIT 1";

	$result = $dbt -> select($SQL);

	$rows = count($result); 
	
echo '<table class="blueTable">';
echo '<thead><tr>';
echo '<th>Last Date</th>';
echo '<th>Station</th>';
echo '<th>Callsign</th>';
echo '<th>Frequency</th>';
echo '<th>Altitude (M)</th>';
echo '<th>Direction</th>';
echo '<th>Distance (KM)</th>';
echo '</tr></thead>';

for ($i = 0; $i <= ( $rows - 1 ); $i++) {
	echo '<tbody><tr>';
 	echo '<td>'. $result[$i]['last_date'] . '</td>';
	echo '<td>'. $result[$i]['station'] . '</td>';
	echo '<td>'. $result[$i]['callsign'] . '</td>';
	echo '<td>'. $result[$i]['freq'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['alt'],1) . '</td>';
	echo '<td>'. $result[$i]['direction'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['distance'],1) . '</td>';
	echo '</tr></tbody>';
}
echo '</table>';
}

function FirstMinAlt() {
global $dbt;

	$SQL = "SELECT * FROM first_seen ORDER BY alt ASC LIMIT 1";

	$result = $dbt -> select($SQL);

	$rows = count($result); 
	
	echo '<table class="blueTable">';
echo '<thead><tr>';
echo '<th>Last Date</th>';
echo '<th>Station</th>';
echo '<th>Callsign</th>';
echo '<th>Frequency</th>';
echo '<th>Altitude (M)</th>';
echo '<th>Direction</th>';
echo '<th>Distance (KM)</th>';
echo '</tr></thead>';

for ($i = 0; $i <= ( $rows - 1 ); $i++) {
	echo '<tbody><tr>';
 	echo '<td>'. $result[$i]['last_date'] . '</td>';
	echo '<td>'. $result[$i]['station'] . '</td>';
	echo '<td>'. $result[$i]['callsign'] . '</td>';
	echo '<td>'. $result[$i]['freq'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['alt'],1) . '</td>';
	echo '<td>'. $result[$i]['direction'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['distance'],1) . '</td>';
	echo '</tr></tbody>';
}
echo '</table>';
}

// Distance
function MaxDistance() {
global $dbt;

	$SQL = "SELECT * FROM sondedata ORDER BY distance DESC LIMIT 1";

	$result = $dbt -> select($SQL);

	$rows = count($result); 
	
echo '<table class="blueTable">';
echo '<thead><tr>';
echo '<th>Last Date</th>';
echo '<th>Station</th>';
echo '<th>Callsign</th>';
echo '<th>Frequency</th>';
echo '<th>Altitude (M)</th>';
echo '<th>Direction</th>';
echo '<th>Distance (KM)</th>';
echo '</tr></thead>';

for ($i = 0; $i <= ( $rows - 1 ); $i++) {
	echo '<tbody><tr>';
 	echo '<td>'. $result[$i]['last_date'] . '</td>';
	echo '<td>'. $result[$i]['station'] . '</td>';
	echo '<td>'. $result[$i]['callsign'] . '</td>';
	echo '<td>'. $result[$i]['freq'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['alt'],1) . '</td>';
	echo '<td>'. $result[$i]['direction'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['distance'],1) . '</td>';
	echo '</tr></tbody>';
}
echo '</table>';
}

function MinDistance() {
global $dbt;

	$SQL = "SELECT * FROM sondedata ORDER BY distance ASC LIMIT 1";

	$result = $dbt -> select($SQL);

	$rows = count($result); 
	
	echo '<table class="blueTable">';
echo '<thead><tr>';
echo '<th>Last Date</th>';
echo '<th>Station</th>';
echo '<th>Callsign</th>';
echo '<th>Frequency</th>';
echo '<th>Altitude (M)</th>';
echo '<th>Direction</th>';
echo '<th>Distance (KM)</th>';
echo '</tr></thead>';

for ($i = 0; $i <= ( $rows - 1 ); $i++) {
	echo '<tbody><tr>';
 	echo '<td>'. $result[$i]['last_date'] . '</td>';
	echo '<td>'. $result[$i]['station'] . '</td>';
	echo '<td>'. $result[$i]['callsign'] . '</td>';
	echo '<td>'. $result[$i]['freq'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['alt'],1) . '</td>';
	echo '<td>'. $result[$i]['direction'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['distance'],1) . '</td>';
	echo '</tr></tbody>';
}
echo '</table>';
}


function FirstMaxDistance() {
global $dbt;

	$SQL = "SELECT * FROM first_seen ORDER BY distance DESC LIMIT 1";

	$result = $dbt -> select($SQL);

	$rows = count($result); 
	
echo '<table class="blueTable">';
echo '<thead><tr>';
echo '<th>Last Date</th>';
echo '<th>Station</th>';
echo '<th>Callsign</th>';
echo '<th>Frequency</th>';
echo '<th>Altitude (M)</th>';
echo '<th>Direction</th>';
echo '<th>Distance (KM)</th>';
echo '</tr></thead>';

for ($i = 0; $i <= ( $rows - 1 ); $i++) {
	echo '<tbody><tr>';
 	echo '<td>'. $result[$i]['last_date'] . '</td>';
	echo '<td>'. $result[$i]['station'] . '</td>';
	echo '<td>'. $result[$i]['callsign'] . '</td>';
	echo '<td>'. $result[$i]['freq'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['alt'],1) . '</td>';
	echo '<td>'. $result[$i]['direction'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['distance'],1) . '</td>';
	echo '</tr></tbody>';
}
echo '</table>';
}

function FirstMinDistance() {
global $dbt;

	$SQL = "SELECT * FROM first_seen ORDER BY distance ASC LIMIT 1";

	$result = $dbt -> select($SQL);

	$rows = count($result); 
	
	echo '<table class="blueTable">';
echo '<thead><tr>';
echo '<th>Last Date</th>';
echo '<th>Station</th>';
echo '<th>Callsign</th>';
echo '<th>Frequency</th>';
echo '<th>Altitude (M)</th>';
echo '<th>Direction</th>';
echo '<th>Distance (KM)</th>';
echo '</tr></thead>';

for ($i = 0; $i <= ( $rows - 1 ); $i++) {
	echo '<tbody><tr>';
 	echo '<td>'. $result[$i]['last_date'] . '</td>';
	echo '<td>'. $result[$i]['station'] . '</td>';
	echo '<td>'. $result[$i]['callsign'] . '</td>';
	echo '<td>'. $result[$i]['freq'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['alt'],1) . '</td>';
	echo '<td>'. $result[$i]['direction'] . '</td>';
	echo '<td>'. _Rounding($result[$i]['distance'],1) . '</td>';
	echo '</tr></tbody>';
}
echo '</table>';
}



function _Rounding($value, $place){ 
	$value = $value * pow(10, $place + 1); 
	$value = floor($value); 
	$value = (float) $value/10; 
	(float) $modSquad = ($value - floor($value)); 
	$value = floor($value); 
		if ($modSquad > .5){ 
			$value++; 
		} 
	return $value / (pow(10, $place)); 
}
