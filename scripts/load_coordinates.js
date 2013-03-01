        
		function set_cookie_lat(lat){
			document.cookie='lat='+lat;
		}
		
		function set_cookie_lng(lng){
			document.cookie='lng='+lng;
		}
		
        function initiate_geolocation() {  
            navigator.geolocation.getCurrentPosition(handle_geolocation_query,handle_errors);  
        }
        
        function handle_errors(error)  
        {  
            switch(error.code)  
            {  
                case error.PERMISSION_DENIED: alert("Please allow Geolocation on your browser to use this site.");  
                break;  
                case error.POSITION_UNAVAILABLE: alert("we could not detect your location. Please try again later.");  
                break;  
                case error.TIMEOUT: alert("Retrieving position timed out. Please refresh page or try again later.");  
                break;  
                default: alert("Sorry, an unknown error has occured. We'll try to fix this as soon as possible.");  
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
        	var lat = position.coords.latitude;
        	var lng = position.coords.longitude;
        	
        	set_cookie_lat(lat);
        	set_cookie_lng(lng);

            var myLatLong = new google.maps.LatLng(lat,lng);
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
			
        }
    	
        $('[data-role=page]').live('pageshow', function (event, ui) {
			initiate_geolocation();
		});
        

        
		
		
		