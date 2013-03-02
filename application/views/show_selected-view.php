<?php $this->load->view('header')?>

<div data-role="page">
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
	    	if($this->session->userdata('isSuperuser')){
	    		echo '<a href="#popupManage" data-rel="popup" data-mini="true" data-inline="true" data-theme="c" class="smallBtn">Manage</a>';
	    	}
	    	if($distance != '') echo '<p>Distance: '.$distance.' km</p>';
	    	if($address != '') echo '<p>Address: '.$address.'</p>';
	    ?>
	    
	    <div data-role="popup" id="popupManage">
			<ul data-role="listview" data-theme="a">
				<li><a href="<?php echo site_url('manage/promo?name='.$name.'&lat='.$lat.'&lng='.$lng.'&address='.$address.'&icon='.$icon.'&id='.$id)?>">Add Promo</a></li>
				<li><a href="<?php echo site_url('manage/event?name='.$name.'&lat='.$lat.'&lng='.$lng.'&address='.$address.'&icon='.$icon.'&id='.$id)?>">Add Event</a></li>
			
			</ul>
		</div>
	    
	    <p>Rating:
	    <?php 
			if (count($rating) > 0){
				if(count($rating[0]['rating']) != ''){
					echo $rating[0]['rating'];
				}
				else{
					echo 'This has not been rated yet.';
				}
			}else{
				echo 'This has not been rated yet.';
			}
		?></p>
	    <!-- <div data-role="controlgroup" data-type="horizontal"> -->
	    	
		</div>
		
		<input type="text" id="lat" value="<?php echo $lat;?>">
		<input type="text" id="lng" value="<?php echo $lng;?>">
		
		<!-- <center><a href="#" id="showmap">Show map</a></center> -->
		<div class="ui-corner-all ui-controlgroup ui-controlgroup-horizontal" style="font-size: 0.5em; margin-left: auto; margin-right: auto; width: 100%;" data-type="horizontal" data-role="controlgroup">
		    <a data-role="button" data-theme="a" data-mini="true" data-inline="true" id="showmap">Map</a>
			<a data-role="button" data-theme="a" data-mini="true" data-inline="true" >Rate</a>
		    <a href="<?php echo 'selected?name='.$name.'&lat='.$lat.'&lng='.$lng.'&distance='.$distance.'&address='.$address.'&icon='.$icon.'&id='.$id.'&rating=1'?>" data-role="button" data-theme="a" data-mini="true" data-inline="true" data-ajax="false">1</a>
		    <a href="<?php echo 'selected?name='.$name.'&lat='.$lat.'&lng='.$lng.'&distance='.$distance.'&address='.$address.'&icon='.$icon.'&id='.$id.'&rating=2'?>" data-role="button" data-theme="a" data-mini="true" data-inline="true">2</a>
		    <a href="<?php echo 'selected?name='.$name.'&lat='.$lat.'&lng='.$lng.'&distance='.$distance.'&address='.$address.'&icon='.$icon.'&id='.$id.'&rating=3'?>" data-role="button" data-theme="a" data-mini="true" data-inline="true">3</a>
		    <a href="<?php echo 'selected?name='.$name.'&lat='.$lat.'&lng='.$lng.'&distance='.$distance.'&address='.$address.'&icon='.$icon.'&id='.$id.'&rating=4'?>" data-role="button" data-theme="a" data-mini="true" data-inline="true">4</a>
		</div>
		<div id="select_result_map"></div>
		
    </div>
    
</div>

<?php $this->load->view('footer')?>