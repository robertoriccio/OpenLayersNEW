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



	  var jArrayLatitudine= <?php echo json_encode($arrayLatitudine ); ?>;
      var jArrayLongitudine= <?php echo json_encode($arrayLongitudine ); ?>;
      var featureCount = 36;

	  



var map = new ol.Map({
target: 'map',
layers: [
new ol.layer.Tile({
source: new ol.source.OSM()
}),raster, vector
],
view: new ol.View({
center: ol.proj.transform([14.2767, 40.863], 'EPSG:4326', 'EPSG:3857'),
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
	
	// CARICAMENTO STAZIONI
	
	//for (i = 0; i < featureCount; ++i) {
		
		
		//var lat = jArrayLatitudine[i];
		//var longi = jArrayLongitudine[i];
		//if(i==0){alert('latitudine: ' + lat + ' longitudine: ' +longi);}
		
		//1
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.59135900,41.06719100],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//2
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.29268100,41.33759500],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//3
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.91501400,41.42482800],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//4
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([15.13805200,41.23429200],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//5
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.43724200,40.94544300],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//6
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.95728400,41.06872800],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//7
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.72260000,41.34747200],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//8
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.10217700,41.35763600],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//9
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.86831000,41.31413300],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//10
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([13.89298300,41.22693700],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//11
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.19855900,41.12397200],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//12
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([15.40239600,40.92855900],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//13
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.37358200,41.12877800],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//14
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([15.06029900,40.84361500],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//15
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([15.02507200,40.93396100],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//16
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.86131600,41.01392500],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//17
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.66433333,41.26533333],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//18
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.47544444,41.28411111],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//19
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.59716667,41.23811111],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//20
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.52850000,41.25755556,],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//21
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.64911111,41.20875000],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//22
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.64333333,41.22861111],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//23
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.63566667,41.21877778],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//24
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.65388889,41.25109167],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//25
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.50788889,41.25452778],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//26
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.70527778,41.19769444],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//27
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.67194444,41.18430556],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//28
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.61233333,41.20888889],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//29
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.54904700,41.22373100],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//30
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.55949300,41.23550800,],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//31
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.54533100,41.24884400],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//32
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.60201600,41.22057000],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//33
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.51321300,41.18907400],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//34
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.55724700,41.19932700,],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//35
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.52653000,41.19426300],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//36
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.55199300,41.20780900],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
		//37
		map.addOverlay(new ol.Overlay({
		//position: ol.proj.transform([longi, lat],'EPSG:4326','EPSG:3857'),
		position: ol.proj.transform([14.50746700,41.21271500,],'EPSG:4326','EPSG:3857'),
		element: $('<img src="marker.png">')
		}));
	
	
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
var center = [parseInt($('#lon').val()), parseInt($('#lat').val())];

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


map.on('singleclick', function(evt) {
var coordinate = evt.coordinate;
var hdms = ol.proj.toLonLat(coordinate, 'EPSG:3857');	
console.log("Coordinates [lon,lat] = " +  hdms);	
var xy = ol.coordinate.toStringXY(ol.proj.transform(coordinate, new ol.proj.Projection('EPSG:3857'), new ol.proj.Projection('EPSG:32632')),6);	
console.log("Coordinates "+xy);	
var d = new Date();
var tm = d.getTime();
// --Send the data using post:
// ----URL:
var url = window.location.pathname;
console.log("url "+url);	
var myreq = "LAT=" + hdms[1] + "&LON=" + hdms[0] + "&TIME=" + tm;
var posting = $.post( url, myreq );	
posting.done( function( data ) {
	alert('Funzione eseguita');
	//$('#stazioni').append( "<span style='padding-top:10px;'>pippo</span>" );
	    var c = [];
        var d = [];
		var d1= [];
        var options = {
                chart: {
                    renderTo: 'plot',
                    defaultSeriesType: 'line'
                },
                title: {
                    text: 'Temp_min'
                },
                xAxis: {
                    title: {
                        text: 'Date Measurement'
                    },
                    categories: c
                },
                yAxis: {
                    title: {
                        text: 'Temp_min'
                    }
                },
                series: [{
					name: 'Point 1',
                    data: d
                }]
        };

        var jqxhr = $.get('temp_min.csv', function(data) {
            var lines = data.split('\n');
            $.each(lines, function(lineNo, line) {
                var items = line.split(',');
                c.push(items[0]);
				d.push(parseInt(items[1]));
			
            })
			var chart = new Highcharts.Chart(options);
			
			
			  
			  $.each(lines, function(lineNo, line) {
                var items = line.split(',');
                
				d1.push(parseInt(items[2]));
			
            })
            chart.addSeries({name: 'Point 2',data:d1});
			

        });
})
})



</script>