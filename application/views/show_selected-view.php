<?php $this->load->view('header')?>

<div id="showresult" data-role="page">
<script>

	function create_map()
    {   
    	var lat = document.getElementById('lat').value;
    	var lng = document.getElementById('lng').value;
    	    
    	var container = $('#select_result_map');
    	var myLatLong = new google.maps.LatLng(lat,lng);
    	var mapOptions = {
			center: myLatLong,
			zoom: 15,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(container[0],mapOptions);
		container.css('display','block');
		var marker = new google.maps.Marker({ 
		position: myLatLong,
		map:map,
		//title:"My Position (Accuracy of Position: " + position.coords.accuracy + " Meters), Altitude: " 
		//  + position.coords.altitude + ' Altitude Accuracy: ' + position.coords.altitudeAccuracy
		});

	}

	jQuery(window).ready(function(){  
	    jQuery('#showmap').click(create_map);  
	});
</script>
	<div data-role="header">
		<?php $this->load->view('navbar.php')?>
    </div><!-- /header -->
    
    <div data-role="content">
    	<div class="ui-bar ui-bar-b">
	    <?php 
	    	$distance = ($distance/1000);
	    	echo '<h1>'.$name.'</h1>';
	    	if($distance != '') echo '<p>Distance: '.$distance.' km</p>';
	    	if($address != '') echo '<p>Address: '.$address.'</p>';
	    ?>
	    <p>Rating: </p>
	    <!-- <div data-role="controlgroup" data-type="horizontal"> -->
	    	
		</div>
		
		<input type="text" id="lat" value="<?php echo $lat;?>">
		<input type="text" id="lng" value="<?php echo $lng;?>">
		<div id="select_result_map"></div>
		<center><a href="#" id="showmap">Show map</a></center>
		<div class="ui-corner-all ui-controlgroup ui-controlgroup-horizontal" style="font-size: 0.7em; margin-left: auto; margin-right: auto; width: 100%; text-align: center;" data-type="horizontal" data-role="controlgroup">
		    <a href="#" data-role="button" data-theme="b" data-icon="refresh" data-iconpos="notext" >1</a>
		    <a href="#" data-role="button" data-theme="b" data-icon="refresh" data-iconpos="notext" >2</a>
		    <a href="#" data-role="button" data-theme="b" data-icon="refresh" data-iconpos="notext" >3</a>
		    <a href="#" data-role="button" data-theme="b" data-icon="refresh" data-iconpos="notext" >4</a>
			</div>
    </div>
    
</div>

<?php $this->load->view('footer')?>