			
			<?php
			if($variabili[12] <> 'no'){
			?>
						  <script>
							var jArrayNomeStazione = <?php echo json_encode($arraynomeStazione); ?>;
							var c = [];
							var d1 = [];
							  var options = {
								chart: {
									renderTo: 'plotRadiation',
									defaultSeriesType: 'line',
									zoomType: 'x'
								},
								title: {
									text: 'Instantaneous Solar Radiation'
								},
								xAxis: {
									title: {
										text: 'Date Measurement'
									},
									categories: c
								},
								yAxis: {
									title: {
										text: 'MJ/m2'
									}
								},
								series: [{
									name: <?php echo json_encode($nomeStazione[0]); ?>,
									turboThreshold: 0,
									data: d1
								}]
						};
								
					</script><?php
				$arrayData = array();  	
					$query ="SELECT DISTINCT(data) FROM rad_int_h24 WHERE data BETWEEN ".$da." AND ".$a." ORDER BY data";
						
						$result=pg_query($pgsql_conn,$query);
						   while ($row = pg_fetch_array($result)) {
							
							array_push($arrayData,$row['data']);
						
							
					  }
					for ($contatore=0; $contatore < $maxN; $contatore++) {
					
						$tSeries = array();
						$arraynomeStazione = array();
						array_push($arraynomeStazione, $nomeStazione[$contatore]);
						$query ="SELECT data,tseries FROM rad_int_h24 WHERE idstazione = ".$stazioni[$contatore]. " AND data BETWEEN ".$da." AND ".$a." ORDER BY data";
						
						$result=pg_query($pgsql_conn,$query);
						   while ($row = pg_fetch_array($result)) {
							//$dataIng = date_parse($row['data']);
							//$dataIta = $dataIng[2]."/".$dataIng[1]."/".$dataIng[0];
							//array_push($arrayData,$row['data']);
							array_push($tSeries, $row['tseries']);
							
					  }
					  
				
					  ?>
	
					<?php 
					if($contatore==0){
					?>
					<script>
					var jArrayData = <?php echo json_encode($arrayData); ?>;
								var jArrayTseries = <?php echo json_encode($tSeries); ?>;
								var jArrayNomeStazione = <?php echo json_encode($arraynomeStazione); ?>;		
									for(k=0; k < jArrayData.length; ++k){
										var dataEng = jArrayData[k].substring(0, 10);
										var parts = dataEng.split("-");
										var dataEng= parts[2]+"/"+parts[1]+"/"+parts[0];
										c.push(dataEng);
										var val = parseFloat(jArrayTseries[k]);
										
										d1.push(val);
										
									}
								
					var chartrad = new Highcharts.Chart(options);
					</script>
					<?php
					}
					else{?>
					<script>
					var d2 = [];
					var jArrayData = <?php echo json_encode($arrayData); ?>;
								var jArrayTseries = <?php echo json_encode($tSeries); ?>;
								var jArrayNomeStazione = <?php echo json_encode($arraynomeStazione); ?>;		
									for(k=0; k < jArrayData.length; ++k){
										
										var val = parseFloat(jArrayTseries[k]);
										d2.push(val);
										
									}
					chartrad.addSeries({name: jArrayNomeStazione[0],data:d2,turboThreshold: 0});
					</script>
					<?php
					}
			}}