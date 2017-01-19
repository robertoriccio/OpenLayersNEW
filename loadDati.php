 <?php
 
 if(ISSET($_GET['nomeStazione'])){
			  $variabili = explode(",", $_GET['var']);
			 
			  $nomeStazione = explode(",", $_GET['nomeStazione']);
			  $stazioni = explode(",", $_GET['stazioni']);
			  $maxN = count($stazioni);
			  for ($contatore=0; $contatore < $maxN; $contatore++) {
				  $arraynomeStazione = array();
				   array_push($arraynomeStazione, $nomeStazione[$contatore]);
				   break;
			  }
			  ?>

<?php


			$conn_string = "host=143.225.214.133 port=5432 dbname=regcamp user=giuliano password=clima";
			$pgsql_conn = pg_connect($conn_string);
			$da = "'".$_GET['Da']."'";
			$a = "'".$_GET['A']."'";
			
			
			include 'load/MinTemperature.php';
		    include 'load/MaxTemperature.php';
			include 'load/Precipitation.php';
			include 'load/MeanTemperature.php';
			include 'load/HrSoil.php';
			include 'load/HumMax.php';
			include 'load/HumMean.php';
			include 'load/HumMin.php';
			include 'load/LeafWet.php';
			include 'load/PressMax.php';
			include 'load/PressMin.php';
			include 'load/PressMean.php';
			include 'load/RadInt.php';
			include 'load/RadMean.php';
			include 'load/TSoil.php';
			include 'load/WindDir.php';
			include 'load/WindSpeed.php';
			
			if(!pg_close($pgsql_conn)) {
						print "Failed to close connection to " . pg_host($pgsql_conn) . ": " .
					   pg_last_error($pgsql_conn) . "<br/>\n";
					} else {
						//print "Successfully disconnected from database";
					}


 }

 
 ?>