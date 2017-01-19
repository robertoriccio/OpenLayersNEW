<?php # Recupero il valore di lang
$lang = $_GET['lang'];

# Se la variabile lang è nulla viene selezionata di default
# la lingua italiana (it)
if ($lang == FALSE)
{
    $lang = "it";
}

# Includo il file di linguaggio interessato
require("lan/{$lang}.php");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
			<!-- OpenLayers CSS -->
		<link rel="stylesheet" href="http://openlayers.org/en/v3.0.0/css/ol.css" type="text/css">
		<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="http://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ol3/3.5.0/ol.css" type="text/css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ol3/3.5.0/ol.js"></script>
		
		<script src="js/Blob.js"></script>
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/data.js"></script>
		<script src="http://highcharts.github.io/export-csv/export-csv.js"></script>
		<script src="http://code.highcharts.com/modules/exporting.js"></script>
		<script src="//a----.github.io/highcharts-export-clientside/bower_components/export-csv/export-csv.js"></script>
		<script type="application/javascript" src="//a----.github.io/highcharts-export-clientside/bower_components/jspdf/dist/jspdf.min.js"></script>
		<script src="//a----.github.io/highcharts-export-clientside/bower_components/highcharts-export-clientside/highcharts-export-clientside.js"></script>
		
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		
		<script>	
			var stazioni = [];
			var nomeStazione = [];
		</script>
		
    <title>Agrometeo - Regione Campania</title>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<link rel="icon" href="img/favicon.ico" />
  </head>
  <body>

    <!-- Contenitore dell'intero sito -->
    <div id="PageWrapper">
	
      <div id="Header"><img src="img/logo_regione_campania.gif" alt="Smiley face" height="42" width="42">
	  
		  <span style="margin-left:20px; font-size: 23px;">AGROMETEO - REGIONE CAMPANIA</span>
		  <span style="float: right; margin-top:5px;"><?php echo $Language; ?>
		  <?php echo "<a href='" . $_SERVER['PHP_SELF'] . "?lang=it'>IT</a> - ";
		  echo "<a href='" . $_SERVER['PHP_SELF'] . "?lang=en'>EN</a>"?>
		  </span>
	  
	  </div>
      <!-- Contenitore dei menu laterali e del contenuto centrale -->
      <div id="Menu-Content-Wrap">
 
        <div id="MainContent">
		
			<div id="Menu-RightMAP" class="Menu-RightMAP">
				
				<span style="font-family: Verdana, Arial, Helvetica;font-size: 11px; margin-top:30px;"><b><?php echo $Options; ?></b></span>
				
				<div id="selectors" class="selectors">
					<form class="form-inline">
						<b><?php echo $geometryType; ?></b>
						<select id="type" style="width:45px;">
							<option value="None"><?php echo $none; ?></option>
							<option value="Point"><?php echo $point; ?></option>
							<option value="Polygon"><?php echo $polygon; ?></option>
							<option value="Circle"><?php echo $circle; ?></option>
						</select>
					</form>
				</div>
				
				
				<b><?php echo $changecenter; ?></b>
				<form role="form">
				<table>
					<tr><td width="25%"><?php echo $latitude; ?></td>
					<td><input type="text" id="lat" placeholder="longitude" value="41.1305" style="width:45px;"></td>
					
					<tr><td width="25%"><?php echo $longitude; ?></td>
					<td><input type="text" id="lon" placeholder="latitude" value="14.787" style="width:45px;"></td></tr>
					<tr><td width="25%"><button type="button" class="btn btn-primary btn-xs" id="changeCenter"><?php echo $change; ?></button></td></tr></table>
				</form>	
	
					<b><?php echo $changerotation; ?></b>
					
					<form role="form">
					<table>
					<tr><td width="25%"><?php echo $degrees; ?></td>
					<td><input type="text"  id="angle" placeholder="rotation angle" value="5" style="width:45px;"></td></tr>
					<tr><td width="25%"><button type="button" class="btn btn-primary btn-xs" id="changeRotation"><?php echo $change; ?></button></td></tr></table>
					</form>
					
					<b><?php echo $changezoom; ?></b>
					<table>
					<form role="form">
					<tr><td width="25%"><?php echo $level; ?></td>
					<td><input type="text" id="level" placeholder="zoom level" value="8" style="width:45px;"></td></tr>
					<tr><td width="25%"><button type="button" class="btn btn-primary btn-xs" id="changeZoom"><?php echo $change; ?></button></td></tr></table>
					</form>
			</div>
		
			       <div id="Menu-Right">
			<br>
			<span style="font-family: Verdana, Arial, Helvetica;font-size: 11px; margin-top:30px;"><b><?php echo $SelectedAgro; ?></b></span>
			<br>
			<button type="button" class="btn btn-primary btn-xs" id="clear" style="margin-top:5px;"><?php echo $Clear; ?></button>
			<?php include 'StationTable.php';?>
			
		</div>
		
		
		
			<div id="map" class="map">
				<div class="mouse-position" id="mouse-position">&nbsp;</div>
			</div>
		
			
			<?php include 'ClimateVariable.php';?>
	
	
			
			<?php
			if ($lang == "it"){
			?>	
			<br><span style="font-family: Verdana, Arial, Helvetica;font-size: 16px; margin-top:10px; margin-left:8px;"><b><?php echo $TemporalPeriod; ?></b></span>
			<span style="font-family: Verdana, Arial, Helvetica;font-size: 16px; margin-top:30px; margin-left:98px;"><b><?php echo $Dati; ?></b></span>
				<span style="font-family: Verdana, Arial, Helvetica;font-size: 16px; margin-top:30px; margin-left:68px;"><b>Download</b></span><br>
			<?php
			}
			else{
			?>	
			<br><span style="font-family: Verdana, Arial, Helvetica;font-size: 16px; margin-top:10px; margin-left:8px;"><b><?php echo $TemporalPeriod; ?></b></span>
			<span style="font-family: Verdana, Arial, Helvetica;font-size: 16px; margin-top:30px; margin-left:159px;"><b><?php echo $Dati; ?></b></span>
			<span style="font-family: Verdana, Arial, Helvetica;font-size: 16px; margin-top:30px; margin-left:61px;"><b>Download</b></span><br>
			<?php	
			}?>
	
	
			<?php include 'DatetimeTable.php';?>
			<br>

				
        </div>
 


        </div>
		
		<span style="font-family: Verdana, Arial, Helvetica;font-size: 16px; margin-left:8px;margin-top:10px;"><b><?php echo $plot; ?></b></span>
			<!-- Our app code -->

		<div class="plot" id="plotTemperature"></div>
		<div class="plot" id="plotPrecipitation"></div>
		<div class="plot" id="plotHrSoil"></div>
		<div class="plot" id="plotHumidity"></div>
		<div class="plot" id="plotLeafWet"></div>
		<div class="plot" id="plotPression"></div>
		<div class="plot" id="plotRadiation"></div>
		<div class="plot" id="plotTSoil"></div>
		<div class="plot" id="plotWind"></div>
		

		<div id="Footer">
		<img src="img/logo_regione_campania.gif" alt="Smiley face" height="42" width="42">
		<span style="margin-left:30px;">2016</span>
		
		<!-- Inizio Codice ShinyStat --><span style="margin-left:300px; float: right;">
		<script type="text/javascript" src="//codice.shinystat.com/cgi-bin/getcod.cgi?USER=Robertoriccio84"></script>
		<noscript>
		<h6><a href="http://www.shinystat.com/it/">
		<img src="//www.shinystat.com/cgi-bin/shinystat.cgi?USER=Robertoriccio84" alt="Contatore visite gratuito" style="border:0px" /></a></h6>
		</noscript></span>
		<!-- Fine Codice ShinyStat -->
		
		</div> 
		
		</div>
		
		<?php 
		include 'functMap.php';
		include 'loadDati.php'; 
		?>

  </body>
</html>