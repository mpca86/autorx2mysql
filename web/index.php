<?php
//
// ######################## TURN OFF ALL ERRORS #############################
//
//
//
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
include("class-database.php");
include("db_data.php");

?>
<!DOCTYPE html>
<html>
<head>
<title>Meteosondy - AMS.sk</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Post Script-->
    <script>
 		$(document).ready(function() {
 			$("#Data").load("sondedata.php");
   			var refreshId = setInterval(function() { $("#Data").load('sondedata.php'); }, 15000);
   			$.ajaxSetup({ cache: false });
		});
	</script>
</head>
<body>
 <script>
 function changeLang(){
  document.getElementById('form_lang').submit();
 }
 </script>
<!-- Wrapper -->
<div id="container"> 
  <!-- Header -->
  <div id="header"><?php include("header.php"); ?>
</div>
  <!-- Main -->
  <div id="body"> 
  <!-- Data that automaticly refreshes--> 
  <div id="Data"></div>
  </div>
  <!-- Footer -->
  <div id="footer"><?php include("footer.php"); ?></div>
</div>
</body>
</html>
