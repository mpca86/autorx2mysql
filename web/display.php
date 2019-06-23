<?php
// Display stuff

// Include Language file
if(isset($_SESSION['lang'])){
 include "lang/".$_SESSION['lang'].".php";
}else{
 include "lang/svk.php";
}

?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
<script type="text/javascript">
	var timeleft = 15;
	var downloadTimer = setInterval(function(){
  	document.getElementById("countdown").innerHTML = timeleft;
  	timeleft -= 1;
  	if(timeleft <= 0){
    	clearInterval(downloadTimer);
    	document.getElementById("countdown").innerHTML = "0"
  	}
	}, 1000);
</script>

	<div id="display">
    <span><?php echo _UPDATEIN; ?> <span id="countdown">15 </span> <?php echo _SECONDS; ?></span>
    </div>

    <div id="display">
    <h2><span class="title"><?php echo _LASTSONDE; ?></span></h2>
    <span><?php TableLastSonde(1); ?></span>
    </div>

    <div>
    <h2><span class="title">Map</span></h2>
    <div><?php MapSondes(1); ?></div>
    </div>
    
    <div id="display">
    <h2><span class="title">Latest 15 Sondes</span></h2>
    <span><?php TableLatestSondes(15); ?></span>
    </div>
        
    <!-- Alt -->
    <div id="display">
    <h2><span class="title">Latest 20 rows from last sondes</span></h2>
    <span><?php TableLastxRows(20); ?></span>
    </div>
