<?php


//___________________________
// S E T   V A R I A B L E S
//___________________________

  
  $servername     = "143.225.214.133";
  $username       = "giuliano";
  $password       = "clima";
  $dbname         = "regcamp";
  

//___________________________________
// C O N N E C T I O N  ::  O P E N
//___________________________________


  // Create connection
  $conn_string = "host=143.225.214.133 port=5432 dbname=regcamp user=giuliano password=clima";
  $pgsql_conn = pg_connect($conn_string);
    if ($pgsql_conn) {
      //  print "Successfully connected to: " . pg_host($pgsql_conn) . "<br/>\n";
    } else {
        print pg_last_error($pgsql_conn);
        exit;
    }

    // QUERY
	$arrayLatitudine = array();
	$arrayLongitudine = array();
	$arrayStazioni = array();
	$arrayId = array();
	
	$query ="SELECT id,stazioni,latitude,longitude FROM anagr";
	$result=pg_query($pgsql_conn,$query);
	   while ($row = pg_fetch_array($result)) {
		array_push($arrayId, $row['id']);
		array_push($arrayStazioni, str_replace(" ","_",$row['stazioni']));
		array_push($arrayLatitudine, $row['latitude']);
		array_push($arrayLongitudine, $row['longitude']);
	  }
	json_encode($arrayId);
	json_encode($arrayStazioni);
	json_encode($arrayLatitudine);
	json_encode($arrayLongitudine);
	
	

    if(!pg_close($pgsql_conn)) {
        print "Failed to close connection to " . pg_host($pgsql_conn) . ": " .
       pg_last_error($pgsql_conn) . "<br/>\n";
    } else {
       // print "Successfully disconnected from database";
    }


?>

<script>

     var raster = new ol.layer.Tile({
        source: new ol.source.OSM()
      });
	  
	        var source = new ol.source.Vector({wrapX: false});

      var vector = new ol.layer.Vector({
        source: source,
        style: new ol.style.Style({
          fill: new ol.style.Fill({
            color: 'rgba(255, 255, 255, 0.2)'
          }),
          stroke: new ol.style.Stroke({
            color: '#ffcc33',
            width: 2
          }),
          image: new ol.style.Circle({
            radius: 7,
            fill: new ol.style.Fill({
              color: '#ffcc33'
            })
          })
        })
      });

// ***MOUSE COORDINATES***
var mousePositionControl = new ol.control.MousePosition({
coordinateFormat: ol.coordinate.createStringXY(4),
projection: 'EPSG:4326',
// comment the following two lines to have the mouse position
// be placed within the map.
className: 'custom-mouse-position',
target: document.getElementById('mouse-position'),
undefinedHTML: '&nbsp;'
});




	  



var map = new ol.Map({
target: 'map',
layers: [
new ol.layer.Tile({
source: new ol.source.OSM()
}),raster, vector
],
view: new ol.View({
center: ol.proj.transform([14.787,41.1305], 'EPSG:4326', 'EPSG:3857'),
zoom: 7.5
}),
controls: ol.control.defaults({
attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
collapsible: false 
})
}).extend([
new ol.control.ScaleLine(),
mousePositionControl
	  		])
});


	var jArrayId = <?php echo json_encode($arrayId ); ?>;
		var jArrayStazioni = <?php echo json_encode($arrayStazioni ); ?>;
		var jArrayLatitudine= <?php echo json_encode($arrayLatitudine ); ?>;
		var jArrayLongitudine= <?php echo json_encode($arrayLongitudine ); ?>;
		var featureCount = jArrayStazioni.length;
		for (i = 0; i < featureCount; ++i) {
			var lat = jArrayLatitudine[i].substring(0, 6);
			var longi =  jArrayLongitudine[i].substring(0, 6);
			var stazione = jArrayStazioni[i];
			var id = jArrayId[i];
			var titolo ="Stazione:"+stazione+"&#13;Latitudine:"+lat+"&#13;Longitudine:"+longi;
	
			map.addOverlay(new ol.Overlay({
		
		
			//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
			position: ol.proj.transform([parseFloat(longi),parseFloat(lat)],'EPSG:4326','EPSG:3857'),
			element: $('<input name=' + stazione +' type="image" src="img/marker.png" alt=' + titolo +' title=' + titolo +' id=' + id +' onclick="storeStation(this)" width="16" height="16"> ')
		}));
	
}

	function storeStation(obj) {
			$('#stazioni').append( "<br><span style='padding-top:10px;'>" + $(obj).attr('name') + "</span>" );
			stazioni.push($(obj).attr('id')); 
			nomeStazione.push($(obj).attr('name')); 
		}

var typeSelect = document.getElementById('type');

      var draw; // global so we can remove it later
      function addInteraction() {
        var value = typeSelect.value;
        if (value !== 'None') {
          var geometryFunction, maxPoints;
          if (value === 'Square') {
            value = 'Circle';
            geometryFunction = ol.interaction.Draw.createRegularPolygon(4);
          } else if (value === 'Box') {
            value = 'LineString';
            maxPoints = 2;
            geometryFunction = function(coordinates, geometry) {
              if (!geometry) {
                geometry = new ol.geom.Polygon(null);
              }
              var start = coordinates[0];
              var end = coordinates[1];
              geometry.setCoordinates([
                [start, [start[0], end[1]], end, [end[0], start[1]], start]
              ]);
              return geometry;
            };
          }
          draw = new ol.interaction.Draw({
            source: source,
            type: /** @type {ol.geom.GeometryType} */ (value),
            geometryFunction: geometryFunction,
            maxPoints: maxPoints
          });
          map.addInteraction(draw);
        }
      }


      /**
       * Handle change event.
       */
      typeSelect.onchange = function() {
        map.removeInteraction(draw);
        addInteraction();
      };

      addInteraction();
	
	
	
	
	//}

// Funzionalità Attive

$(document).ready(function() {
// create a vector layer used for editing
var vector_layer = new ol.layer.Vector({
  name: 'my_vectorlayer',
  source: new ol.source.Vector({
	  //features: [iconFeature]
	}),
  style: new ol.style.Style({
    fill: new ol.style.Fill({
      color: 'rgba(255, 255, 255, 0.2)'
    }),
    stroke: new ol.style.Stroke({
      color: '#ffcc33',
      width: 2
    }),
    image: new ol.style.Circle({
      radius: 7,
      fill: new ol.style.Fill({
        color: '#ffcc33'
      })
    })
  })
});

$('#angle').val(map.getView().getRotation());
$('#level').val(map.getView().getZoom());

$('#changeCenter').on('click', function() {
var center = [parseFloat($('#lon').val()), parseFloat($('#lat').val())];

map.getView().setCenter(ol.proj.transform(center, 'EPSG:4326', 'EPSG:3857'));
map.getView().setZoom(8);
});

$('#changeRotation').on('click', function() {
map.getView().setRotation($('#angle').val() * Math.PI / 180);
});

$('#changeZoom').on('click', function() {
map.getView().setZoom($('#level').val());
});

// Compute the current extent of the view given the map size
var extent = map.getView().calculateExtent(map.getSize());

// Transform the extent from EPSG:3857 to EPSG:4326
extent = ol.extent.applyTransform(extent, ol.proj.getTransform("EPSG:3857", "EPSG:4326"));

$('#minlon').val(extent[0]);
$('#minlat').val(extent[1]);
$('#maxlon').val(extent[2]);
$('#maxlat').val(extent[3]);

$('#change').on('click', function() {

var minlon = parseInt($('#minlon').val());
var minlat = parseInt($('#minlat').val());
var maxlon = parseInt($('#maxlon').val());
var maxlat = parseInt($('#maxlat').val());

// Trasnform extent to EPSG:3857
var extent = [minlon, minlat, maxlon, maxlat];
extent = ol.extent.applyTransform(extent, ol.proj.getTransform("EPSG:4326", "EPSG:3857"));

map.getView().fitExtent(extent, map.getSize());
});

})

$('#submit').on('click', function() {
   map.removeInteraction(draw);
        addInteraction();


});

		$('#submit').on('click', function() {
				var sel=0;
				var variabili = [];
				if( document.getElementById("temperature").value == 'mintemp'){
					sel=sel+1;
					variabili.push("mintemp"); 
				}
				else{
					variabili.push("no");
				}
				if( document.getElementById("temperature").value == 'maxtemp'){
					sel=sel+1;
					variabili.push("maxtemp");
				}	
				else{
					variabili.push("no");
				}
				if( document.getElementById("precipitation").value == 'precipitation' && document.getElementById("orderby").value == 'giorno'){
					sel=sel+1;
					variabili.push("precipitationh24");
				}
				else if( document.getElementById("precipitation").value == 'precipitation' && document.getElementById("orderby").value == 'ora'){
					sel=sel+1;
					variabili.push("precipitationh1");
					
				}				
				else{
					variabili.push("no");
				}
				
				if( document.getElementById("temperature").value == 'meantemp' && document.getElementById("orderby").value == 'giorno'){
					sel=sel+1;
					variabili.push("meantemph24");
					
				}
				else if( document.getElementById("temperature").value == 'meantemp' && document.getElementById("orderby").value == 'ora'){
					sel=sel+1;
					variabili.push("meantemph1");
					
				}	
				else{
					variabili.push("no");
				}
				if( document.getElementById("hrsoil").value == 'hrsoil'){
					sel=sel+1;
					variabili.push("hrsoil");
				}	
				else{
					variabili.push("no");
				}
				if( document.getElementById("humidity").value == 'hummax'){
					sel=sel+1;
					variabili.push("hummax");
				}	
				else{
					variabili.push("no");
				}
				if( document.getElementById("humidity").value == 'hummean' && document.getElementById("orderby").value == 'giorno'){
					sel=sel+1;
					variabili.push("hummeanh24");
					
				}
				else if( document.getElementById("humidity").value == 'hummean' && document.getElementById("orderby").value == 'ora'){
					sel=sel+1;
					variabili.push("hummeanh1");
					
				}	
				else{
					variabili.push("no");
				}
				if( document.getElementById("humidity").value == 'hummin'){
					sel=sel+1;
					variabili.push("hummin");
				}	
				else{
					variabili.push("no");
				}
				if( document.getElementById("leafwet").value == 'leafwet'){
					sel=sel+1;
					variabili.push("leafwet");
				}	
				else{
					variabili.push("no");
				}
				if( document.getElementById("pression").value == 'pressmax'){
					sel=sel+1;
					variabili.push("pressmax");
				}	
				else{
					variabili.push("no");
				}
				if( document.getElementById("pression").value == 'pressmin'){
					sel=sel+1;
					variabili.push("pressmin");
				}	
				else{
					variabili.push("no");
				}
				if( document.getElementById("pression").value == 'pressmean'){
					sel=sel+1;
					variabili.push("pressmean");
				}	
				else{
					variabili.push("no");
				}
				if( document.getElementById("radiation").value == 'radint'){
					sel=sel+1;
					variabili.push("radint");
				}	
				else{
					variabili.push("no");
				}
				if( document.getElementById("radiation").value == 'radmean'){
					sel=sel+1;
					variabili.push("radmean");
				}	
				else{
					variabili.push("no");
				}
				if( document.getElementById("tsoil").value == 'tsoil'){
					sel=sel+1;
					variabili.push("tsoil");
				}	
				else{
					variabili.push("no");
				}
				if( document.getElementById("wind").value == 'winddir'){
					sel=sel+1;
					variabili.push("windir");
				}	
				else{
					variabili.push("no");
				}
				if( document.getElementById("wind").value == 'windspeed'){
					sel=sel+1;
					variabili.push("windspeed");
				}	
				else{
					variabili.push("no");
				}
				if(stazioni.length==0){
					alert('Selezionare una stazione dalla mappa');
					return;
				}
				
				if(sel==0){
					alert('Selezionare una variabile climatica');
					return;
				}
			
				$.ajax({
				  
				  type: "POST",
				  url: "index.php",
				  data: 'stazioni='+ stazioni + '&nomeStazione='+ nomeStazione + '&var='+ variabili,
				  dataType: "html",
				  success: function(msg)
				  {
					
					var giornoDA = document.getElementById('giornoDA').value;
					var meseDA = document.getElementById('meseDA').value;
					var annoDA = document.getElementById('annoDA').value;
					var giornoA = document.getElementById('giornoA').value;
					var meseA = document.getElementById('meseA').value;
					var annoA = document.getElementById('annoA').value;
					var dataDA = annoDA +'-'+ meseDA + '-' + giornoDA;
					var dataA = annoA +'-'+ meseA + '-' + giornoA;
					location.href = "index.php?stazioni="+ stazioni +"&nomeStazione="+ nomeStazione +"&Da="+ dataDA +"&A="+ dataA +"&var="+ variabili;
					
				
					
				  },
				  error: function()
				  {
					alert("Chiamata fallita, si prega di riprovare...");
				  }
			}); 
		
		
		
		});



$('#clear').on('click', function() {
	location.href = "index.php"
	
	
})

$('#downloadcsv').on('click', function() {
	try {
    charttemp.downloadCSV();
	}
	catch(err) {
    }
	try {
    chartpress.downloadCSV();
	}
	catch(err) {
    }
	try {
    //chartprec.downloadCSV();
	    var chart = $('#plotPrecipitation').highcharts();
    alert(chart.getCSV());
	var myCsv = chart.getCSV();
    //window.open('data:text/csv;charset=utf-8,' + escape(myCsv));
	
	var blob = new Blob(myCsv, {type: "text/csv;charset=utf-8"});
saveAs(blob, "hello world.csv");

	}
	catch(err) {
    }
	try {
    chartleaf.downloadCSV();
	}
	catch(err) {
    }
	try {
    charthum.downloadCSV();
	}
	catch(err) {
    }
	try {
    charthrsoil.downloadCSV();
	}
	catch(err) {
    }
	try {
    chartwind.downloadCSV();
	}
	catch(err) {
    }
	try {
    charttsoil.downloadCSV();
	}
	catch(err) {
    }
	try {
    chartrad.downloadCSV();
	}
	catch(err) {
    }
	

});

$('#downloadxls').on('click', function() {

	
	try {
    charttemp.downloadXLS();
	}
	catch(err) {
    }
	try {
    chartpress.downloadXLS();
	}
	catch(err) {
    }
	try {
    chartprec.downloadXLS();
	}
	catch(err) {
    }
	try {
    chartleaf.downloadXLS();
	}
	catch(err) {
    }
	try {
    charthum.downloadXLS();
	}
	catch(err) {
    }
	try {
    charthrsoil.downloadXLS();
	}
	catch(err) {
    }
	try {
    chartwind.downloadXLS();
	}
	catch(err) {
    }
	try {
    charttsoil.downloadXLS();
	}
	catch(err) {
    }
	try {
    chartrad.downloadXLS();
	}
	catch(err) {
    }

});

$('#downloadjpeg').on('click', function() {
	try {
			
		    charttemp.exportChart({
			filename: 'temperature',
            type: 'image/jpeg'
        });
	}
	catch(err) {
    }
	try {
   
		    chartpress.exportChart({
			filename: 'pression',
            type: 'image/jpeg'
        });
	}
	catch(err) {
    }
	try {
 
	    chartprec.exportChart({
			filename: 'precipitation',
            type: 'image/jpeg'
        });
	}
	catch(err) {
    }
	try {
    
		    chartleaf.exportChart({
			filename: 'leaf',
            type: 'image/jpeg'
        });
	}
	catch(err) {
    }
	try {
    
		    charthum.exportChart({
			filename: 'thum',
            type: 'image/jpeg'
        });
	}
	catch(err) {
    }
	try {
 
		    charthrsoil.exportChart({
			filename: 'hrsoil',
            type: 'image/jpeg'
        });
	}
	catch(err) {
    }
	try {
   
		    chartwind.exportChart({
			filename: 'wind',
            type: 'image/jpeg'
        });
	}
	catch(err) {
    }
	try {
   
		    charttsoil.exportChart({
			filename: 'tsoil',
            type: 'image/jpeg'
        });
	}
	catch(err) {
    }
	try {
 
		    chartrad.exportChart({
			filename: 'precipitation',
            type: 'image/jpeg'
        });
	}
	catch(err) {
    }
	

});


</script>