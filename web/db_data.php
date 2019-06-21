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
echo '<th>'. _LASTDATE .'</th>';
echo '<th>'. _STATION .'</th>';
echo '<th>' . _CALLSIGN .'</th>';
echo '<th>' . _TIME .'</th>';
echo '<th>Frequency</th>';
echo '<th>' . _LAT .'</th>';
echo '<th>' . _LON .'</th>';
echo '<th>Satelites</th>';
echo '<th>Altitude (M)</th>';
echo '<th>Direction</th>';
echo '<th>Distance (KM)</th>';
echo '<th>Speed</th>';
echo '<th>BT</th>';
echo '<th>Temperature</th>';
echo '<th>Humidity</th>';
echo '<th>Battery</th>';
echo '<th>Evel</th>';
echo '<th>Bear</th>';
echo '<th>Comment</th>';
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
