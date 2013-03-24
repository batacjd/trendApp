<?php $this->load->view('header')?>

<?php $this->load->view('navbar.php')?>
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
	    jQuery('#showmap').show(create_map);  
	});

</script>
<style>

</style>
    
<div class="row content">
	<div class="span6">
	    
		<?php 
	    	$distance = ($distance/1000);
	    	echo '<h3>'.$name;
	    	if($this->session->userdata('isSuperuser')){
	    		echo '
	    			<div class="btn-group">
	    				<a class="btn btn-danger btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Manage<span class="caret"></span></a>
	    				<ul class="dropdown-menu">
							<li><a href="'.site_url('manage/promo?name='.$name.'&lat='.$lat.'&lng='.$lng.'&address='.$address.'&icon='.$icon.'&id='.$id).'">Add Promo</a></li>
							<li><a href="'.site_url('manage/event?name='.$name.'&lat='.$lat.'&lng='.$lng.'&address='.$address.'&icon='.$icon.'&id='.$id).'">Add Event</a></li>
						</ul>
					</div>
					
					';
	    	
	    	}
	    	echo '</h3>';
	    	if($distance != '') echo '<p>Distance: '.$distance.' km</p>';
	    	if($address != '') echo '<p>Address: '.$address.'</p>';
	    ?>
	    
	    
			
	    
	    <p>Average Rating:
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
		
		<input type="text" id="lat" value="<?php echo $lat;?>">
		<input type="text" id="lng" value="<?php echo $lng;?>">
		
		<!-- <center><a href="#" id="showmap">Show map</a></center> -->
		<div class="btn-toolbar">
		<div class="btn-group">
		    <a class="btn btn-small" id="showmap">Map</a>
			<a class="btn btn-small">Rate</a>
		    <a class="btn btn-small <?php if(count($userrating)> 0 && $userrating != '') { if($userrating[0]['rating'] == '1') echo 'disabled'; } ?>" href="<?php echo 'selected?name='.$name.'&lat='.$lat.'&lng='.$lng.'&distance='.$distance.'&address='.$address.'&icon='.$icon.'&id='.$id.'&rating=1'?>" >1</a>
		    <a class="btn btn-small <?php if(count($userrating)> 0 && $userrating != '') { if($userrating[0]['rating'] == '2') echo 'disabled'; } ?>" href="<?php echo 'selected?name='.$name.'&lat='.$lat.'&lng='.$lng.'&distance='.$distance.'&address='.$address.'&icon='.$icon.'&id='.$id.'&rating=2'?>" >2</a>
		    <a class="btn btn-small <?php if(count($userrating)> 0 && $userrating != '') { if($userrating[0]['rating'] == '3') echo 'disabled'; } ?>" href="<?php echo 'selected?name='.$name.'&lat='.$lat.'&lng='.$lng.'&distance='.$distance.'&address='.$address.'&icon='.$icon.'&id='.$id.'&rating=3'?>" >3</a>
		    <a class="btn btn-small <?php if(count($userrating)> 0 && $userrating != '') { if($userrating[0]['rating'] == '4') echo 'disabled'; } ?>" href="<?php echo 'selected?name='.$name.'&lat='.$lat.'&lng='.$lng.'&distance='.$distance.'&address='.$address.'&icon='.$icon.'&id='.$id.'&rating=4'?>" >4</a>
		</div>
		</div>
		<div id="select_result_map"></div>
	
	</div>
	<br>
	<div class="span6">
		<p class="lead">So, what's happening here?</p>
		<p>Check out their promos and events below!</p>
		<hr>
		<div class="tabbable">
		
			<ul class="nav nav-tabs">
				<li class="active"><a href="#promo" data-toggle="tab">Promos</a></li>
				<li><a href="#event" data-toggle="tab">Events</a></li>
			</ul>
			
			<div class="tab-content">
				<div class="tab-pane active" id="promo">
					<ul class="nav nav-tabs nav-stacked nav_results">
						<?php 
							    
							if(count($promos) > 0 && $promos != ''){
								
								foreach($promos as $r){
									
									echo '<li>
											<a href="'.site_url('promo_event/selected?pid='.$r['promoeventid']).'"><p>'.$r['promoeventname'].'</p><p>'.$r['unitname'].'</p></a>
										</li>';
								}
								
							}else{
								echo '<div class="alert alert-warning">';
						    	echo '<li data-icon="false">Sorry. No promos listed yet.</li>';
						    	echo '</div>';
							}
						?>
					</ul>
				</div>
				<div class="tab-pane" id="event">
							<ul class="nav nav-tabs nav-stacked nav_results">
							<?php 
						    
						    	if(count($events) > 0  && $events != ''){
									foreach($events as $r){
										echo '<li>
												<a href="'.site_url('promo_event/selected?pid='.$r['promoeventid']).'"><p>'.$r['promoeventname'].'</p><p>'.$r['unitname'].'</p></a>
											</li>';
										
									}
						    	}else{
						    		echo '<div class="alert alert-warning">';
						    		echo '<li data-icon="false">Sorry. No events listed yet.</li>';
						    		echo '</div>';
						    	}
						    	
							?>
						    </ul>
				</div>
			</div>
		</div>
		
	 <div class="well well-small well_rec">
	 	<p>Users who rated this also checked these places:</p>
					<ul class="nav nav-tabs nav-stacked nav_results">
						<?php 
							if(count($recommendations) > 0 && $recommendations != ''){
								foreach($recommendations as $r){
									echo '	<li>
												<i class="icon-'.$r['categoryid'].' pull-left"></i>
												<a href="'.site_url('search/selected?name='.$r['unitname'].'&lat='.$r['lat'].'&lng='.$r['lng'].'&distance=1000&address='.$r['address'].'&icon='.$r['categoryid'].'&id='.$r['venueid']).'"><p>'.$r['unitname'].'</p><p>'.$r['address'].' || Rating: '.$r['rating'].'</p></a>
											</li>';
									
								}
						    }else{
						    	
						    	echo '<li><a>Sorry, no other recommendations yet.</a></li>';
						    }
						?>
					</ul>
	 </div>
	</div>

</div>


<?php $this->load->view('footer')?>