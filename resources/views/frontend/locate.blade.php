<!DOCTYPE html>
<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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

    <!-- <input id="pac-input" class="controls" type="text" placeholder="Enter Address"> -->
    
    <div id="map"></div>
    
   <!--   <div id="current" class="text-center">Move The marker around</div> 
    
    <input id="three-word" type="hidden" name="attributes[What 3 words]">
    
    <img width="150px" margin="auto" src="what3words_logo_final.png"/>
 -->
    
    <script src='/js/what3words-map-marker.js'></script>
    <!-- 
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtUZHevSsuCITMsYD2etL5b-FSdmcfBjA&libraries=places&callback=initMap" async defer></script> -->
   <button>
     <a href="https://map.what3words.com/convert-to-3wa?coordinates=51.520957,-0.195521&key=79NK10MQ">Click Here</a>
   </button> 
<!-- 
   https://api.what3words.com/v3/convert-to-3wa?coordinates=51.520847,-0.195521&key=[API-KEY] -->
 
    <!-- AIzaSyAtUZHevSsuCITMsYD2etL5b-FSdmcfBjA -->
    <!-- 79NK10MQ -->
    <!-- <div class="w3w-embed w3w-small"><style type="text/css">@import url("https://assets.what3words.com/css/w3w-glyphicon.css" ); </style> <div class="w3w-address notranslate"> <i class="w3w-logo-slashes w3w-red"><svg x="0px" y="0px" viewBox="0 0 32 32"><path fill="currentColor" d="M10.7,4h2L4,28H2L10.7,4z M19.7,4h2L13,28h-2L19.7,4z M28.7,4h2L22,28h-2L28.7,4z"></path></svg></i>daring.lion.race </div><div class="w3w-popup"> <div class="w3w-popup-inner"> what3words gives every 3m x 3m in the world a unique 3 word address. This one describes the precise entrance of the building. <a href="http://what3words.com/about/" target="_blank">Click here to learn more.</a> </div></div></div>
 -->
 <!-- <a href="https://map.what3words.com/daring.lion.race" target="_blank"><div class="w3w-embed w3w-small"><style type="text/css">@import url("https://assets.what3words.com/css/w3w-glyphicon.css");</style><div class="w3w-address"><i class="w3w-logo-slashes w3w-red"><svg x="0px" y="0px" viewBox="0 0 32 32"><path fill="currentColor" d="M10.7,4h2L4,28H2L10.7,4z M19.7,4h2L13,28h-2L19.7,4z M28.7,4h2L22,28h-2L28.7,4z"></path></svg></i><span class="addr notranslate"></span></div></div></a>
 -->
  </body>
</html>
<!-- 79NK10MQ --> 