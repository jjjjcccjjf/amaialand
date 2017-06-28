<!DOCTYPE html>
<html>
<head>
  <title>Amaialand Maps</title>
<script src='https://api.mapbox.com/mapbox-gl-js/v0.34.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v0.34.0/mapbox-gl.css' rel='stylesheet' />
<style>
       body {
      background: #404040;
      color: #f8f8f8;
      font: 500 20px/26px 'Helvetica Neue', Helvetica, Arial, Sans-serif;
      margin: 0;
      padding: 0;
      -webkit-font-smoothing: antialiased;
    }

    .map {
      position: absolute;
      width: 100%;
      top: 0;
      bottom: 0;
    }

    /* Marker Customization */
    .mapboxgl-popup-close-button {
      /*display: none;*/
    }

    .mapboxgl-popup-content {
      font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', Sans-serif;
      width: 180px;
      padding: 0 10px;
      color: #000;
      text-align: center;
    }

    .mapboxgl-container {
      cursor: pointer;
    }

    #popup-image {
      width: 170px;
      height: 90px;
      padding-top: 10px;
    }
</style>
</head>
<body>

<div id="map" class="map">MAP
  <button type="button" onclick="renderMap('schools')">Schools</button>
  <button type="button" onclick="renderMap('hospitals')">Hospitals</button>
  <button type="button" onclick="renderMap('churches')">Churches</button>
  <button type="button" onclick="renderMap('malls')">Malls</button>
  <button type="button" onclick="renderMap('supermarkets')">Supermarkets</button>
  <button type="button" onclick="renderMap('restaurants')">Restaurants</button>
  <button type="button" onclick="renderMap('cinemas')">Cinemas</button>
  <button type="button" onclick="renderMap('hotels')">Hotels</button>
</div>

<script>
// Get-around of removeChild on older browsers
if (!('remove' in Element.prototype)) {
  Element.prototype.remove = function() {
    if (this.parentNode) {
      this.parentNode.removeChild(this);
    }
  };
}

//all categories
var categories = ["schools", "hospitals", "churches", "malls", "supermarkets", "restaurants", "cinemas", "hotels"]; //Note: These string should match the layer name on mapbox studio


//branch of focus
var amaia_branch = "<?php echo strtolower($_GET['amaia_branch']); ?>"; //"alabang"; //Change this keyword to any of the listed branches and the map will automatically adjust
//change to category of focus i.e. schools/hospitals/...
var category = "schools"; //Change this keyword to any of the listed categories and the map will automatically adjust

//Center of Map
var mapcenterx = 121.01608;
var mapcentery = 14.428240;
var mapzoom = 12.87;

mapboxgl.accessToken = 'pk.eyJ1IjoiYW1haWFsYW5kIiwiYSI6ImNqMWVqcWN3MDAwMDgyd3FnMDlheWtucnkifQ.Eh6lMPFT-u2N5cz6mwkLuA';
var map = new mapboxgl.Map({
  container: 'map',
  center: [mapcenterx, mapcentery],
  zoom: mapzoom,
  //Changes published on the map style take effect after about 10mins.
  style: 'mapbox://styles/amaialand/cj1okww78000d2spoz2570wuv'
});

function renderMap(cat) {
  //get value of pressed button and set it as the category
  category = cat;

  for(var j = 0; j < categories.length; j++) {
    map.setLayoutProperty(amaia_branch + '-' + categories[j], 'visibility', 'none');
  }

  // map.setCenter([mapcenterx, mapcentery]);
  // map.setZoom(mapzoom);
  map.setLayoutProperty(amaia_branch + '-' + category, 'visibility', 'visible');
  map.setLayoutProperty('amaia-' + amaia_branch, 'visibility', 'visible');

  limit = 0;
}

map.on('load', function(e) {

  //makes other layer invisible
  for(var j = 0; j < categories.length; j++) {
    map.setLayoutProperty(amaia_branch + '-' + categories[j], 'visibility', 'none');
  }

  map.setLayoutProperty(amaia_branch + '-' + category, 'visibility', 'visible');
  map.setLayoutProperty('amaia-' + amaia_branch, 'visibility', 'visible');
});

//shows popup on map load
var limit = 0;
if(limit < 1) {
  map.on('data',  function(e){
    var features = map.queryRenderedFeatures(e.point, { layers: ['amaia-' + amaia_branch] });
    if(features.length) {
      var feature = features[0];
      createPopUp(feature, true);
      limit++;
    }
  });
}

function flyToLocation(currentFeature) {
  map.flyTo({
    center: currentFeature.geometry.coordinates,
    zoom: 14.7
  });
}

function createPopUp(currentFeature, hasImage) {
  var popUps = document.getElementsByClassName('mapboxgl-popup');
  if (popUps[0]) popUps[0].remove();

  if(hasImage) {
    var popup = new mapboxgl.Popup({ closeOnClick: false })
    .setLngLat(currentFeature.geometry.coordinates)
    //placeholder-image
    .setHTML('<img src="http://www.lamudi.com.ph/static/media/bm9uZS9ub25l/2x304x228/16e9280190ca99.jpg" id="popup-image" alt="' + currentFeature.properties.name + ' image"/><h4>' + currentFeature.properties.name + '<h4>')
    //this will get the image link from the properties node of the geojson tree from mapbox
    // .setHTML('<img src="' + currentFeature.properties.image + '" id="popup-image" alt="' + currentFeature.properties.name + ' image"/><h4>' + currentFeature.properties.name + '<h4>')
    .addTo(map);
  } else {
    var popup = new mapboxgl.Popup({ closeOnClick: false })
    .setLngLat(currentFeature.geometry.coordinates)
    .setHTML('<h4>' + currentFeature.properties.name + '</h4>')
    .addTo(map);
  }
}

map.on('click', function(e) {
  var branchFeatures = map.queryRenderedFeatures(e.point, { layers: ['amaia-' + amaia_branch] });
  var categoryFeatures = map.queryRenderedFeatures(e.point, { layers: [amaia_branch + '-' + category] });

  if (categoryFeatures.length) {
    var clickedPoint = categoryFeatures[0];
    flyToLocation(clickedPoint);
    createPopUp(clickedPoint, false);
  }

  if(branchFeatures.length) {
    var clickedPoint = branchFeatures[0];
    flyToLocation(clickedPoint);
    createPopUp(clickedPoint, true);
  }
});
</script>
</body>
</html>
