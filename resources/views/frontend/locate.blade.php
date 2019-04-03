<!DOCTYPE html>
<html>
  <head> -->
    <!-- new added --><link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>What3words Maps</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8"> <!-- new added -->


  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
  <script src="/js/what3words.js"></script>
    <title>What3words Demo</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      html, body {
              text-align: center;
              width: 800px;
              height: 500px;
              margin: 0 auto;
              }
      #map {
              margin: auto;
              width: 100%;
              height:100%;
              padding: 10px;
              }
      
      #pac-input {
              text-align: center;
              } 
    </style>
  </head>
  
  <body>


<!-- new added --><div class="map-container" style="height: 100%;">
        <input id="pac-input" class="controls" type="text" placeholder="Enter Address">
        <div id="map"></div>
        <div id="current">Loading...</div>
    </div>    
    <script src="vendor/w3w-javascript-wrapper/dist/W3W.Geocoder.min.js"></script>
    <script src="js/init-w3w.js"></script>
    <script src='js/init-marker.js'></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=KS18UC0Z&libraries=places&callback=initMap"
            async defer></script> --><!-- new added -->


    <!-- <input id="pac-input" class="controls" type="text" placeholder="Enter Address">
     -->
    <div id="map"></div>
    
    <div id="current" class="text-center">Move The marker around</div>
    
    <input id="three-word" type="hidden" name="attributes[What 3 words]">
    
    <img width="150px" margin="auto" src="what3words_logo_final.png"/>

    
    <script src='/js/what3words-map-marker.js'></script>
    
<!--     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtUZHevSsuCITMsYD2etL5b-FSdmcfBjA&libraries=places&callback=initMap" async defer></script> -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4S5nv2MBVnM9Za0-vWjyGQhpouSg3N44&amp;libraries=places&amp;callback=initMap" async="" defer=""></script>

  </body>
</html>
