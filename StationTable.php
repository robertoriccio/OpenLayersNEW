<div class="stazioni" id="stazioni">
 <?php

 if(ISSET($_GET['nomeStazione'])){
			  $variabili = explode(",", $_GET['var']);
			 
			  $nomeStazione = explode(",", $_GET['nomeStazione']);
			  $stazioni = explode(",", $_GET['stazioni']);
			  $var = explode(",", $_GET['var']);
			  $maxN = count($stazioni);
			  for ($contatore=0; $contatore < $maxN; $contatore++) {
				
				   echo "<br><span style='padding-top:10px;'>".$nomeStazione[$contatore]."</span>";
				  
 }}
?>
<script type="text/javascript">

    var jArray= <?php echo json_encode($stazioni ); ?>;

    for(var i=0;i<jArray.length;i++){
        stazioni.push(jArray[i]);
		
    }
	var kArray= <?php echo json_encode($nomeStazione ); ?>;

    for(var i=0;i<kArray.length;i++){
        nomeStazione.push(kArray[i]);
		
		
    }
	
    var lArray= <?php echo json_encode($var ); ?>;

    for(var i=0;i<lArray.length;i++){
        	if(lArray[i] == 'mintemp'){
				document.getElementById("temperature").value = 'mintemp'
			}
			if(lArray[i] == 'maxtemp'){
				document.getElementById("temperature").value = 'maxtemp'
			}
			if(lArray[i] == 'precipitationh24' || lArray[i] == 'precipitationh1'){
				document.getElementById("precipitation").value = 'precipitation'
			}
			if(lArray[i] == 'meantemp'){
				document.getElementById("temperature").value = 'meantemp'
			}
			if(lArray[i] == 'hrsoil'){
				document.getElementById("hrsoil").value = 'hrsoil'
			}
			if(lArray[i] == 'hummax'){
				document.getElementById("humidity").value = 'hummax'
			}
			if(lArray[i] == 'hummeanh24' || lArray[i] == 'hummeanh1'){
				document.getElementById("humidity").value = 'hummean'
			}
			if(lArray[i] == 'hummin'){
				document.getElementById("humidity").value = 'hummin'
			}
			if(lArray[i] == 'pressmean'){
				document.getElementById("pression").value = 'pressmean'
			}
			if(lArray[i] == 'pressmax'){
				document.getElementById("pression").value = 'pressmax'
			}
			if(lArray[i] == 'pressmin'){
				document.getElementById("pression").value = 'pressmin'
			}
			if(lArray[i] == 'leafwet'){
				document.getElementById("leafwet").value = 'leafwet'
			}
			if(lArray[i] == 'radint'){
				document.getElementById("radiation").value = 'radint'
			}
			if(lArray[i] == 'radmean'){
				document.getElementById("radiation").value = 'radmean'
			}
			if(lArray[i] == 'tsoil'){
				document.getElementById("tsoil").value = 'tsoil'
			}
			if(lArray[i] == 'windir'){
				document.getElementById("wind").value = 'winddir'
			}
			if(lArray[i] == 'windspeed'){
				document.getElementById("wind").value = 'windspeed'
			}
			
			
		
		
    }
	

 </script>

</div>
