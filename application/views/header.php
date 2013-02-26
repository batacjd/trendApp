<!DOCTYPE html>
<html>
    <head>
    <title>trendApp</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="/trendApp/scripts/jquery.mobile-1.2.0/jquery.mobile-1.2.0.min.css" />
    <link rel="stylesheet" href="/trendApp/scripts/jquery.mobile-1.2.0/themes/blue_1.css" />
	<script src="/trendApp/scripts/jquery.mobile-1.2.0/jquery-1.8.2.min.js"></script>
	<link rel="stylesheet" href="/trendApp/scripts/css/icons.css" />
	<script src="/trendApp/scripts/jquery.mobile-1.2.0/jquery.mobile-1.2.0.min.js"></script>
	
	<script src="trendApp/scripts/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
    <script>
    
    	initiate_geolocation();
        //jQuery(window).ready(function(){  
        //    jQuery("#btnInit").click(initiate_geolocation);  
        //});  
        
        function initiate_geolocation() {  
            navigator.geolocation.getCurrentPosition(handle_geolocation_query,handle_errors);  
        }  
        
        function handle_errors(error)  
        {  
            switch(error.code)  
            {  
                case error.PERMISSION_DENIED: alert("user did not share geolocation data");  
                break;  
                case error.POSITION_UNAVAILABLE: alert("could not detect current position");  
                break;  
                case error.TIMEOUT: alert("retrieving position timed out");  
                break;  
                default: alert("unknown error");  
                break;  
            }  
        }  
        
        function handle_geolocation_query(position)  
        {  
            //static map
            //var image_url = "http://maps.google.com/maps/api/staticmap?sensor=false&center=" + position.coords.latitude + "," +  
            //                position.coords.longitude + "&zoom=14&size=300x400&markers=color:blue|label:S|" +  
            //                position.coords.latitude + ',' + position.coords.longitude;  
            //jQuery("#map").remove();  
            //$("#map").prepend("<img src="+image_url+">");
        	var container = $('#map_home');
            var myLatLong = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
            var mapOptions = {
              center: myLatLong,
              zoom: 13,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(container[0],mapOptions);
            container.css('display','block');
            var marker = new google.maps.Marker({ 
              position: myLatLong,
              map:map,
              title:"My Position (Accuracy of Position: " + position.coords.accuracy + " Meters), Altitude: " 
                + position.coords.altitude + ' Altitude Accuracy: ' + position.coords.altitudeAccuracy
            });
			$('#lat_home').update(position.coords.latitude);
        }
        
    </script>
	<style>
	
	#map_home { 
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 5px 14px -9px rgba(0, 0, 0, 0.29);
        height: 100px;
        width: 100%;
        display: none;
      }</style>
	
</head> 
<body> 
